function toggle_insert_fields() {

let div_input_meaning = document.getElementById("div_meaning");
let div_input_example = document.getElementById("div_example");
let div_input_reference = document.getElementById("div_reference");
let div_input_translation = document.getElementById("div_translation");
let query_action = document.getElementById("query_action");

// this is messy. get a loop in here
console.log(query_action.value);
console.log(input_example.value);
if (query_action.value == "insert") {
  div_input_meaning.style.display = "block";
  div_input_example.style.display = "block";
  div_input_translation.style.display = "block";
  div_input_reference.style.display = "block";
}
  else {
  div_input_meaning.style.display = "none";
  div_input_example.style.display = "none";

}
}
