<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Engaged;
use frontend\models\Program;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    // public function behaviors()
    // {
    //     return [
    //         'access' => [
    //             'class' => AccessControl::className(),
    //             'only' => ['logout', 'signup'],
    //             'rules' => [
    //                 [
    //                     'actions' => ['signup'],
    //                     'allow' => true,
    //                     'roles' => ['?'],
    //                 ],
    //                 [
    //                     'actions' => ['logout'],
    //                     'allow' => true,
    //                     'roles' => ['@'],
    //                 ],
    //             ],
    //         ],
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'logout' => ['post'],
    //             ],
    //         ],
    //     ];
    //}

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['index','create','update','view'],
                        'rules' => [
                            // allow authenticated users
                            [
                                'allow' => true,
                                'roles' => ['@'],
                            ],
                            // everything else is denied
                        ],
                    ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */

     public function actionMeform()
     {
       if(!empty($_POST['checkbox'])){
            foreach ($_POST['checkbox'] as $check) {
              echo $check;

          }
    $checklist=$_POST['checkbox'];
        $date=$_POST['date'];
        $start=$_POST['start'];
        $end=$_POST['end'];
       return $this->render('/site/meform',['checklist'=>$checklist,'date'=>$date,'start'=>$start,'end'=>$end]);
     }
   }

   public function actionIns()
   {
     if(!empty($_POST['checkbox'])){
          foreach ($_POST['checkbox'] as $check) {
            echo $check;

        }

        $init=$_POST['init'];
        $name=$_POST['name'];
        $location=$_POST['location'];
        $priority=$_POST['priority'];
        $description=$_POST['description'];
        $type=$_POST['type'];
        $checklist=$_POST['checkbox'];
        $date=$_POST['date'];
        $start=$_POST['start_time'];
        $end=$_POST['end_time'];
        $start_time=date("H:i",strtotime($start));
        $end_time=date("H:i",strtotime($end));

        $con=mysqli_connect("localhost","root","12345","ems");

    if (mysqli_connect_errno($con)) {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
      $query="INSERT INTO program(name,location,date,start_time,end_time,description,init_weight,priority,type) VALUES('$name','$location','$date','$start_time','$end_time','$description',$init,'$priority','$type')";
      // if(!mysqli_query($con,$query))
      //   echo("".mysqli_error($con));
      $result=mysqli_query($con,$query);
      $p=Program::find()->orderBy(['id'=>SORT_DESC])->one();
      $program_id = $p->id;
      $query2="INSERT INTO engaged(program_id,minister_id,attending,reason) VALUES ($program_id,$init,1,'Initiator')";
      $result2=mysqli_query($con,$query2);
      foreach($checklist as $l)
      {
        $query3="INSERT INTO engaged(program_id,minister_id,attending,reason) VALUES ($program_id,$l,0,'')";
        $result3=mysqli_query($con,$query3);
      }
   }
   return $this->redirect(['/program/view', 'id' => $program_id]);
 }

    public function actionIndex()
    {
        $id=Yii::$app->user->identity->id;
        $result = Program::findBySql("SELECT * from program p inner join engaged e on p.id=e.program_id where e.minister_id=$id and e.attending=1 order by p.date,p.start_time ASC")->all();
        // echo $id;
        // print_r($result);
       return $this->render('index',['tables'=>$result]);
    }

    public function actionProfile()
    {
        return $this->render('profile');
    }
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionTest()
    {
        return $this->render('test');
    }

    public function actionTest2()
    {
        return $this->render('test2');
    }
    public function beforeAction($action){
      $this->enableCsrfValidation= false;
      return parent::beforeAction($action);
    }
    public function actionProgs($id)
    {
      $con=mysqli_connect("localhost","root","12345","ems");

      if (mysqli_connect_errno($con)) {
         echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }




          //mysqli_close($con);

          if(isset($_POST['attending'])){
            $attending=$_POST['attending'];
            $reason=$_POST['message'];
            $pid=$_POST['pid'];
            $mid=$_POST['mid'];
            // print_r($attending);
            // print_r($reason);
            // print_r($pid);
            // print_r($mid);
            $query="UPDATE engaged set attending=$attending,reason='$reason' WHERE program_id=$pid AND minister_id=$mid";
            $result = mysqli_query($con,$query);
            //echo mysqli_affected_rows($con);
            $_POST['attending']='';
            $_POST['message']='';
            $_POST['pid']='';
            $_POST['mid']='';
            // print_r($_POST['attending']);
            // print_r($_POST['message']);
            // print_r($_POST['pid']);
            // print_r($_POST['mid']);
            // print_r($result);
          }



        mysqli_close($con);
        return $this->render('progs',['id'=>$id]);
    }
    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionMail()
    {
      Yii::$app->mailer->compose()
        ->setFrom('sumit.hotchandani@gmail.com')
        ->setTo('kailashgaur10@gmail.com')
        ->setSubject('Test Mail')
        ->setTextBody('Plain text content')
        ->setHtmlBody('<b>HTML content</b>')
        ->send();
    }
}
