<?php require '../includes/header.php'?>


<?php


 $object  = "uploads/video-example.mp4";
 $streamHostUrl = "{$config['cloudfront']['url']}";
 $expires = new DateTime("+5 seconds");


  $url = $cloudfront->getSignedUrl([

      'url' => $streamHostUrl."/".$object,
      'expires'=> $expires->getTimestamp(),
      'private_key'=> "../{$config['cloudfront']['private_key']}",
      'key_pair_id'=> $config['cloudfront']['key_pair_id']

  ]);




?>



<video width="600" controls>


    <source src="<?php echo $url; ?>" type="video/mp4">


</video>








<?php require '../includes/footer.php'?>
