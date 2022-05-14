  <?php
  $dbhost = "localhost";
  $dbuser = "sm";
  $dbpass = "1029";
  $dbname = "vocab";
  
  //Connect to MySQL Server
  // Create connection
  $con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  } 
   // Retrieve data from Query String
  $input_lemma = mysqli_real_escape_string($con,$_GET['lemma']);
  $input_language = mysqli_real_escape_string($con,$_GET['language']);
  $input_partofspeech = mysqli_real_escape_string($con,$_GET['partofspeech']);
  $input_lemma_id = mysqli_real_escape_string($con,$_GET['lemma_id']);
  $input_meaning = mysqli_real_escape_string($con,$_GET['meaning']);
  $input_example = mysqli_real_escape_string($con,$_GET['example']);
  $input_reference = mysqli_real_escape_string($con,$_GET['reference']);
  $input_translation = mysqli_real_escape_string($con,$_GET['translation']);

   // need a try-catch here and for the other INSERT
   //build query
  if ($input_lemma != "") {
    $query = "INSERT INTO lemmas (lemmas.language, lemmas.lemma, lemmas.partofspeech, lemmas.id) VALUES('$input_language','$input_lemma','$input_partofspeech', '$input_lemma_id')";
    $query .= ";";
    echo "Query: " . $query . "<br/><br/>";
    mysqli_select_db($con,$dbname);  
   //Execute query
    $qry_result = mysqli_query($con,$query); 
  }
   // need a try-catch here and for the other INSERT
  if ( $input_meaning != "") {
    $query = "INSERT INTO meanings (meanings.language, meanings.lemma, meanings.partofspeech, meanings.id, meanings.meaning) VALUES('$input_language','$input_lemma','$input_partofspeech', '$input_lemma_id', '$input_meaning')";
    $query .= ";";
    echo "Query: " . $query . "<br/><br/>";
    mysqli_select_db($con,$dbname);  
   //Execute query
    $qry_result = mysqli_query($con,$query); 
    echo $query;
  }

  if ( $input_example != "") {
    $query = "INSERT INTO examples (examples.language, examples.example, examples.reference, examples.translation) VALUES('$input_language','$input_example', '$input_reference', '$input_translation')";
    $query .= ";";
    echo "Query: " . $query . "<br/><br/>";
    mysqli_select_db($con,$dbname);  
   //Execute query
    $qry_result = mysqli_query($con,$query); 
  }
  ?>
