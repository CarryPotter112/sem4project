<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern PHP Calculator</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
            background: linear-gradient(135deg,rgb(134, 50, 223),rgb(214, 52, 255));
            color: white;
            transition: background 0.3s, color 0.3s;
        }

        .container {
            display: inline-block;
            padding: 30px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        input, select, button {
            padding: 12px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        input, select {
            width: 200px;
            background: white;
            color: black;
        }

        button {
            background: #ff7eb3;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #ff4d94;
            transform: scale(1.1);
        }

        .result {
            margin-top: 15px;
            font-size: 24px;
            font-weight: bold;
            background: rgba(0, 0, 0, 0.2);
            padding: 10px;
            border-radius: 5px;
        }

        /* Dark mode */
        .dark-mode {
            background: linear-gradient(135deg, #1e1e1e, #3a3a3a);
            color: #f0f0f0;
        }

        .dark-mode .container {
            background: rgba(0, 0, 0, 0.5);
        }

        .dark-mode input, .dark-mode select {
            background: #444;
            color: white;
        }

        .dark-mode button {
            background: #ff4d94;
        }

        .dark-mode button:hover {
            background: #ff7eb3;
        }

        /* Dark mode toggle button */
        .dark-mode-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px 20px;
            background: #222;
            color: white;
            border-radius: 25px;
            cursor: pointer;
            transition: 0.3s;
        }

        .dark-mode-toggle:hover {
            background: #555;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <h2>Modern PHP Calculator</h2>
    <div class="container">
        <form method="post">
            <input type="number" name="num1" placeholder="Enter first number" required>
            <select name="operator">
                <option value="add">➕</option>
                <option value="subtract">➖</option>
                <option value="multiply">✖️</option>
                <option value="divide">➗</option>
            </select>
            <input type="number" name="num2" placeholder="Enter second number" required>
            <br>
            <button type="submit" name="calculate">Calculate</button>
        </form>

        <?php
        if (isset($_POST['calculate'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operator = $_POST['operator'];
            $result = "";

            switch ($operator) {
                case "add":
                    $result = $num1 + $num2;
                    break;
                case "subtract":
                    $result = $num1 - $num2;
                    break;
                case "multiply":
                    $result = $num1 * $num2;
                    break;
                case "divide":
                    if ($num2 == 0) {
                        $result = "Cannot divide by zero!";
                    } else {
                        $result = $num1 / $num2;
                    }
                    break;
                default:
                    $result = "Invalid operation";
            }

            echo "<p class='result'>Result: $result</p>";
        }
        ?>
    </div>

    <div class="dark-mode-toggle" onclick="toggleDarkMode()">🌙 Dark Mode</div>

    <script>
        function toggleDarkMode() {
            document.body.classList.toggle("dark-mode");

            // Save dark mode state in localStorage
            if (document.body.classList.contains("dark-mode")) {
                localStorage.setItem("darkMode", "enabled");
                document.querySelector(".dark-mode-toggle").textContent = "☀️ Light Mode";
            } else {
                localStorage.setItem("darkMode", "disabled");
                document.querySelector(".dark-mode-toggle").textContent = "🌙 Dark Mode";
            }
        }

        // Apply dark mode if it was enabled previously
        window.onload = function () {
            if (localStorage.getItem("darkMode") === "enabled") {
                document.body.classList.add("dark-mode");
                document.querySelector(".dark-mode-toggle").textContent = "☀️ Light Mode";
            }
        };
    </script>
</body>
</html>