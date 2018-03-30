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


    /**
     * Lists all Program models.
     * @return mixed
     */
    public function actionIndex()
    {
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
      $result = mysqli_query($con,"select e.minister_id from engaged e join program p on e.program_id=p.id");
       while(   $row = mysqli_fetch_array($result))
       {
         print_r($row);
       }
      $date='2018-03-21';
      $start='06:00 pm';
      $end='06:00 pm';
      if(isset($_POST['minister']))
      {
        $flag=1;
        print_r($_POST['minister']);
        print_r($_POST['date']);
         print_r($_POST['start']);
         print_r($_POST['end']);
        // $busy = Yii::app()->db->createCommand()
        // ->select('e.minister_id')
        // ->from('engaged e')
        // ->join('program p','p.id=e.program_id')
        // ->where('e.attending=1')->exe();
        //  $busy= Engaged::find('minister_id')->where(['attending'=>1])->innerJoin('program','program.id = minister.program_id');
        //  echo "Behen ka lauda";
        // print_r($busy[0]->minister_id);

        // $busy=new Query;
        // $busy->select(['SELECT minister_id'])
        // ->from('engaged')
        // ->join('INNER JOIN','program','engaged.program_id=p.id');
        // $command=$busy->createCommand();
        // $data=$command->queryAll();
   $con=mysqli_connect("localhost","root","12345","ems");

   if (mysqli_connect_errno($con)) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
$date=$_POST['date'];
$start=$_POST['start'];
$end=$_POST['end'];

echo $date;
   $result = mysqli_query($con,"select e.minister_id from engaged e join program p on e.program_id=p.id where p.date='$date' and e.attending=1 and p.start_time>='$start' and p.end_time<='$end'");
while(   $row = mysqli_fetch_array($result))
{
  print_r($row);
}


//   $data = $row[0];

   mysqli_close($con);



      }

      return $this->render('schedule',['ministers'=>$ministers,'row'=>$row,'flag'=>$flag,'date'=>$date,'start'=>$start,'end'=>$end]);
    }

    /**
     * Creates a new Program model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Program();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
