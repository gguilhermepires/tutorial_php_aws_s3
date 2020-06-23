<?php require '../includes/header.php'?>

<?php


    $objs = $s3->getIterator('ListObjects', [


        'Bucket' => $config['s3']['bucket']


    ]);


    $object = 'uploads/image_5.jpg';


    $cmd =  $s3->getCommand('GetObject', [

       'Bucket' => $config['s3']['bucket'],
       'Key' => $object

   ]);


 $request =  $s3->createPresignedRequest($cmd, '+10 seconds');

 $url = (string) $request->getUri();





?>




<h1>Index</h1>



    <table class="table">
       <thead>
         <tr>
            <th>Name</th>
            <th>Download</th>

          </tr>
        </thead>
        <tbody>

        <?php foreach($objs as $object): ?>



          <tr>
            <td>
                <?php $object_name = explode('/', $object['Key']);
                echo end($object_name); ?>
            </td>
            <td><a href="<?php echo $url; ?>" download="<?php echo $url; ?>">Download</a></td>
         </tr>


        <?php endforeach; ?>

       </tbody>
     </table>







<?php require '../includes/footer.php'?>


