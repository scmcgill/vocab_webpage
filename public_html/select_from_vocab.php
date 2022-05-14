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
$input_language = mysqli_real_escape_string($con,$_GET['language']);
$input_partofspeech = mysqli_real_escape_string($con,$_GET['partofspeech']);
$input_lemma = mysqli_real_escape_string($con,$_GET['lemma']);

   //build query
$query = "SELECT lemmas.lemma, lemmas.partofspeech, meanings.meaning FROM lemmas INNER JOIN meanings ON lemmas.id=meanings.id";

$where_clause = array();
if ($input_language !== ""){
	array_push($where_clause," lemmas.language = '$input_language' ");
}
if ($input_partofspeech !== ""){
	array_push($where_clause, " lemmas.partofspeech = '$input_partofspeech' ");
}
if ($input_lemma !== ""){
 $search_term = " lemmas.lemma LIKE \"%$input_lemma%\"";
 array_push($where_clause,$search_term);
}

$where_clause_size = count($where_clause);
if ($where_clause_size > 0){
 $query .= " WHERE " . $where_clause[0];
 for ($i = 1; $i < $where_clause_size; $i++){
  $query .= " AND " . $where_clause[$i];
}
}
$query .=";";
echo "Query: " . $query;
mysqli_select_db($con,$dbname);  
   //Execute query
$qry_result = mysqli_query($con,$query); 
// output results to table
echo "<table id=\"query_output\"><tr><th>Word</th><th>P.O.S.</th><th>Meaning</th></tr>";
$display_string = "";
while($row = mysqli_fetch_array($qry_result)) {
   echo "<tr><td>" . $row['lemma'] . "</td><td>" . " (" . $row['partofspeech'] . "): " . "</td><td>" . $row['meaning'] . "</td></tr>";
}
echo "</table>";
?>   
