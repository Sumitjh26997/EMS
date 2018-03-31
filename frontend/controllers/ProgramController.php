<?php

namespace frontend\controllers;

use Yii;
use backend\models\User;
use frontend\models\Program;
use frontend\models\Engaged;
use frontend\models\ProgramSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;

/**
 * ProgramController implements the CRUD actions for Program model.
 */
class ProgramController extends Controller
{
    /**
     * @inheritdoc
     */
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
                         'only' => ['index','create','update','view','schedule','remove','alter'],
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

public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
}

    /**
     * Lists all Program models.
     * @return mixed
     */
    public function actionIndex()
    {
          Yii::$app->controller->enableCsrfValidation = false;

        $searchModel = new ProgramSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRemove()
    {
      $searchModel = new ProgramSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('remove', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
    }

    public function actionAlter()
    {
      $searchModel = new ProgramSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('alter', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
    }

    /**
     * Displays a single Program model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }



    public function actionSchedule()
    {
      $con=mysqli_connect("localhost","root","12345","ems");

      if (mysqli_connect_errno($con)) {
         echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $flag=0;
      $userminister=Yii::$app->user->identity->id;
      $ministers = User::find()->all();
      $checked = User::find()->all();
      $result = mysqli_query($con,"select e.* from engaged e join program p on e.program_id=p.id");
       // while(   $row = mysqli_fetch_array($result))
       // {
       //   print_r($row);
       // }
      $date='2018-03-21';
      $start='06:00 pm';
      $end='06:00 pm';
      if(isset($_POST['minister']))
      {
        $flag=1;

      $id = $_POST['minister'];
      $iddata =implode("','",$id);
      //print_r($iddata);
      $checked = mysqli_query($con,"select * from user where id in ('$iddata')");
      //print_r($checked);
      // while($row = mysqli_fetch_array($checked))
      //  {
      //    print_r($row);
      //
      //
      //  }

   $con=mysqli_connect("localhost","root","12345","ems");

   if (mysqli_connect_errno($con)) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
$date=$_POST['date'];
$start=$_POST['start'];
$end=$_POST['end'];

//echo $date;
   $result = mysqli_query($con,"select e.minister_id from engaged e join program p on e.program_id=p.id where p.date='$date' and e.attending=1 and p.start_time>='$start' and p.end_time<='$end'");

// while(   $row = mysqli_fetch_array($result))
// {
//   print_r($row);
//
//
// }
//print_r($result);
//   $data = $row[0];

   mysqli_close($con);



      }

      return $this->render('schedule',['ministers'=>$ministers,'result'=>$result,'flag'=>$flag,'date'=>$date,'start'=>$start,'end'=>$end,'checked'=>$checked]);
    }

    /**
     * Creates a new Program model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
 public function actionCreateme()
    {

        // $connection= new \yii\db\Connection([
        //   'dsn' => 'mysql:host=localhost;dbname=ems',
        //   'username'=>'root',
        //   'password'=>'12345',
        // ]);
        // $connection->open();
       if(!empty($_POST['checkbox'])){
        foreach ($_POST['checkbox'] as $check) {
          echo $check;
          
        }
        print_r($_POST['checkbox']);
      }
        $model = new Program();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // $find=Program::find()->orderBy(['id'=>SORT_DESC])->one();
            // $find->program_weight=0;
            // $find->save();
            // //$entry = new Engaged();
            // $p=Program::find()->orderBy(['id'=>SORT_DESC])->one();
            // $program_id = $p->id;
            // $minister_id = Yii::$app->user->identity->id;
            // $command=$connection->createCommand()->insert('engaged',['program_id'=>$program_id,'minister_id'=>$minister_id,'attending'=>1,'reason'=>'Personal'])->execute();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('createme', [
            'model' => $model,
        ]);
    }
     public function actionCheck()
    { 
       $con=mysqli_connect("localhost","root","12345","ems");

   if (mysqli_connect_errno($con)) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
      if(!empty($_POST['check_list'])){
        foreach ($_POST['check_list'] as $check) {
          echo $check;
          # code...
        }
        print_r($_POST['check_list']);

        $ministers=User::find()->where(['in','id',$_POST['check_list']])->all();
      //print_r($ministers);
      $date=$_POST['date'];
      $start_time=date("H:i",strtotime($_POST['start_time']));
      $end_time=date("H:i",strtotime($_POST['end_time']));

      if($start_time < $end_time)
      {
        echo "oldjwhsh";
      }


      $busy ="select e.* from engaged e join program p on p.id = e.program_id where  p.date = '$date' and e.attending = 1 and (('$start_time' >= p.start_time and '$end_time'<=p.end_time) or ('$start_time'<=p.start_time and '$end_time'>=p.start_time) or ('$start_time'<=p.end_time and '$end_time'>=p.end_time));";
      $result=mysqli_query($con,$busy);

      while($row = mysqli_fetch_array($result))
      {
        print_r($row);
      }

       return $this->render('check',['minister'=>$ministers,'start_time'=> $start_time,'end_time'=>$end_time,'busy'=>$result,'date'=>$date]);
      }
      
/*      mysqli_close($con);*/
       
    }


    public function actionCreate()
    {

        $connection= new \yii\db\Connection([
          'dsn' => 'mysql:host=localhost;dbname=ems',
          'username'=>'root',
          'password'=>'12345',
        ]);
        $connection->open();
        $model = new Program();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $find=Program::find()->orderBy(['id'=>SORT_DESC])->one();
            $find->program_weight=0;
            $find->save();
            //$entry = new Engaged();
            $p=Program::find()->orderBy(['id'=>SORT_DESC])->one();
            $program_id = $p->id;
            $minister_id = Yii::$app->user->identity->id;
            $command=$connection->createCommand()->insert('engaged',['program_id'=>$program_id,'minister_id'=>$minister_id,'attending'=>1,'reason'=>'Personal'])->execute();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


   

    /**
     * Updates an existing Program model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Program model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Program model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Program the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Program::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
//select e.minister_id from engaged e join program p on e.program_id=p.id where p.date='2018-03-21' and e.attending=1 and p.start_time>='05:00 pm' and p.end_time<='06:00 pm'
