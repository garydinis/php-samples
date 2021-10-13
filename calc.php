<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> My Calculator </title>
    </head>
    <body>
        <form>
            <input type="number" name="num1" value="num1" placeholder="Number One" />
            <input type="number" name="num2" value="num2" placeholder="Number Two" />
            <select name="operator">
                <option>None</option>
                <option>Add</option>
                <option>Sub</option>
                <option>Mul</option>
                <option>Div</option>
            </select>
            <br />
            <button type="submit" name="submit" value="submit">Calculate</button>
        </form>
        <p> The answer is: </p>
        <?php
            echo "here";
            if (isset($_GET["submit"])) {
                $num1 = $_GET["num1"];
                $num2 = $_GET["num2"];
                switch($_GET["operator"]) {
                    case "None":
                        echo "Error: Select a operator";
                        break;
                    case "Add":
                        echo $num1 + $num2;
                        break;
                    case "Sub":
                        echo $num1 - $num2;
                        break;
                    case "Mul":
                        echo $num1 * $num2;
                        break;
                    case "Div":
                        echo $num1 / $num2;
                        break;
                }
            }
        ?>
    </body>
</html>