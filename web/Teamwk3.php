<!DOCTYPE html>
<html>
 <head>
 </head>
 <body>
     <form action = "teamwk3end.php" method ="POST">
        <fieldset>
            <legend>Information</legend>
            Name:<input type="text" name="name" id="name">
            Email:<input type="text" name="email" id="email">
            <fieldset>
                <legend>Major</legend>
            Computer Sciencs:<input type="radio" name="major" value="ComputerScience">
            Web Design and Development:<input type="radio" name="major" value="Web Design and Development">
            Computer Information Technology:<input type="radio" name="major" value="Computer Information Technology">
            Computer Engineering:<input type="radio" name="major" value="Computer Engineering">
            </fieldset>
            Comments:<input type="text area" name="comments" >
         </fieldset>
         <fieldset>
             <legend>Continents Visited</legend>
             North America<input type="checkbox" name="continent[]" value="North America">
             South America<input type="checkbox" name="continent[]" value="South America">
             Europe<input type="checkbox" name="continent[]" value="Europe">
             Asia<input type="checkbox" name="continent[]" value="Asia">
             Australia<input type="checkbox" name="continent[]" value="Australia">
             Africa<input type="checkbox" name="continent[]" value="Africa">
             Antartica<input type="checkbox" name="continent[]" value="Antarctica">
         </fieldset>
         <input type="submit" name="submit" value="submit">
     </form>
 </body>
</html>