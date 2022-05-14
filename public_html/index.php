<!DOCTYPE HTML>
<html>

<head>
  <meta name="generator" content="HTML Tidy for HTML5 for Linux version 5.7.45">
  <title>Vocab DB</title>
  <link rel="stylesheet" href="/css/style.css">
  <script type="text/javascript" src="./js/toggle_input.js"></script>
</head>

<body>
  <script language="javascript" type="text/javascript">
    function query_db() {


      let action = document.getElementById("query_action").value;
      if (action == "") {
        document.getElementById("ajaxDiv").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ajaxDiv").innerHTML = this.responseText;
          }
        };
        let lemma = document.getElementById("input_lemma").value;
        let lang = document.getElementById("input_language").value;
        let pos = document.getElementById("input_partofspeech").value;
        let meaning = document.getElementById("input_meaning").value;
        let example = document.getElementById("input_example").value;
        let reference = document.getElementById("input_reference").value;
        let translation = document.getElementById("input_translation").value;
        let lemma_id = lang + "_" + pos + "_" + lemma;
        console.log(lemma_id);
        // change server-side file to accept all parameters and add all values from forms here
        if (action == "select") {
          xmlhttp.open("GET", "select_from_vocab.php?language=" + lang + "&partofspeech=" + pos + "&lemma=" + lemma, true);
        }
        if (action == "insert") {
          xmlhttp.open("GET", "insert_into_vocab.php?language=" + lang + "&partofspeech=" + pos + "&lemma=" + lemma + "&lemma_id=" + lemma_id + "&meaning=" + meaning + "&translation=" + translation + "&example=" + example + "&reference=" + reference,
            true);
        }
        xmlhttp.send();
      }
    }
  </script>
  <form name='form_query' id="form_query">
    Action: <select id='query_action' onchange="toggle_insert_fields()">
      <option value="" selected>
        Select Action
      </option>
      <option value="select">Select</option>
      <option value="insert">Insert</option>
      <input type="button" id="form_button" onclick="query_db(this.value)" value="Submit">
    </select>
    <table>
      <tbody>
        <tr>
          <td>
            <label for="input_lemma">Lemma</label>
            <input id="input_lemma"><br>
          </td>
          <td>

            Language: <select id='input_language'>
              <option value="">
                Select Language
              </option>
              <option value="esperanto">
                Esperanto
              </option>
              <option value="german">
                German
              </option>
              <option value="arabic">
                Arabic
              </option>
              <option value="french">
                French
              </option>
              <option value="persian">
                Persian
              </option>
              <option value="spanish">Spanish
              </option>
            </select>

          </td>
        </tr>

        <tr>
          <td>
            <div id="div_meaning" class="hide_on_load">
              <label for="input_meaning">Meaning</label>
              <input id="input_meaning"><br>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div id="div_reference" class="hide_on_load">
              <label for="input_reference">Reference</label>
              <input id="input_reference"></input>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <div id="div_example" class="hide_on_load">
              <label for="input_example">Example</label>
              <input id="input_example"></input>
            </div>
          </td>
        </tr>
        <tr>
        <tr>
          <td>
            <div id="div_translation" class="hide_on_load">
              <label for="input_translation">Translation</label>
              <input id="input_translation"></input>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <label for="input_partofspeech">Part of Speech</label>
            <select id="input_partofspeech">
              <option value=""></option>
              <option value="noun">Noun</option>
              <option value="verb">Verb</option>
              <option value="adjective">Adjective</option>
              <option value="adverb">Adverb</option>
            </select>
          </td>
        </tr>
        </tr>
      </tbody>
    </table>
  </form>
  <br>
  <br>
  <div id='ajaxDiv'>
    Your result will display here
  </div>
</body>

</html>
