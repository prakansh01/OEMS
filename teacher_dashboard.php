<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <style>
        /* Global Style */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        /* Navbar styling */
        .navbar {
            background-color: #333;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
            color: #fff;
        }

        .navbar ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar ul li {
            margin-left: 20px;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .navbar ul li a:hover {
            background-color: #575757;
        }

        /* Hero section styling */
        .hero-section {
            margin-top: 80px;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .exam-card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
        }

        .exam-card:hover {
            transform: scale(1.05);
        }

        .exam-title {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .crud-icons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .crud-icons i {
            font-size: 24px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .crud-icons i:hover {
            color: #007bff;
        }

        /* Icon colors */
        .fa-plus-circle {
            color: green;
        }

        .fa-eye {
            color: blue;
        }

        .fa-edit {
            color: orange;
        }

        .fa-trash {
            color: red;
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            .exam-card {
                padding: 15px;
            }
            .exam-title {
                font-size: 16px;
            }
            .crud-icons i {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">MyCompany</div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Live Exams</a></li>
            <li><a href="#">Upload Questions</a></li>
            <li><a href="#">Results</a></li>
            <li><a href="#">Profile</a></li>
        </ul>
    </div>

    <!-- Hero Section -->
    <div class="hero-section">
        <!-- Dynamically creating 10 exam cards -->
        <div class="exam-card" id="exam1">
            <div class="exam-title">Exam 1: Physics 101</div>
            <div class="crud-icons">
                <i class="fas fa-plus-circle" onclick="createQuestion('exam1')"></i>
                <i class="fas fa-eye" onclick="readQuestions('exam1')"></i>
                <i class="fas fa-edit" onclick="updateQuestions('exam1')"></i>
                <i class="fas fa-trash" onclick="deleteQuestions('exam1')"></i>
            </div>
        </div>

        <div class="exam-card" id="exam2">
            <div class="exam-title">Exam 2: Chemistry Basics</div>
            <div class="crud-icons">
                <i class="fas fa-plus-circle" onclick="createQuestion('exam2')"></i>
                <i class="fas fa-eye" onclick="readQuestions('exam2')"></i>
                <i class="fas fa-edit" onclick="updateQuestions('exam2')"></i>
                <i class="fas fa-trash" onclick="deleteQuestions('exam2')"></i>
            </div>
        </div>

        <div class="exam-card" id="exam3">
            <div class="exam-title">Exam 3: Advanced Math</div>
            <div class="crud-icons">
                <i class="fas fa-plus-circle" onclick="createQuestion('exam3')"></i>
                <i class="fas fa-eye" onclick="readQuestions('exam3')"></i>
                <i class="fas fa-edit" onclick="updateQuestions('exam3')"></i>
                <i class="fas fa-trash" onclick="deleteQuestions('exam3')"></i>
            </div>
        </div>

        <!-- Add 7 more divs similar to the above for a total of 10 exams -->
        <!-- Placeholder for additional exams -->
        <div class="exam-card" id="exam4">
            <div class="exam-title">Exam 4: Biology Overview</div>
            <div class="crud-icons">
                <i class="fas fa-plus-circle" onclick="createQuestion('exam4')"></i>
                <i class="fas fa-eye" onclick="readQuestions('exam4')"></i>
                <i class="fas fa-edit" onclick="updateQuestions('exam4')"></i>
                <i class="fas fa-trash" onclick="deleteQuestions('exam4')"></i>
            </div>
        </div>
        
        <!-- Placeholder for more exams -->
        <div class="exam-card" id="exam5">
            <div class="exam-title">Exam 5: History 101</div>
            <div class="crud-icons">
                <i class="fas fa-plus-circle" onclick="createQuestion('exam5')"></i>
                <i class="fas fa-eye" onclick="readQuestions('exam5')"></i>
                <i class="fas fa-edit" onclick="updateQuestions('exam5')"></i>
                <i class="fas fa-trash" onclick="deleteQuestions('exam5')"></i>
            </div>
        </div>

        <div class="exam-card" id="exam6">
            <div class="exam-title">Exam 6: Literature Classics</div>
            <div class="crud-icons">
                <i class="fas fa-plus-circle" onclick="createQuestion('exam6')"></i>
                <i class="fas fa-eye" onclick="readQuestions('exam6')"></i>
                <i class="fas fa-edit" onclick="updateQuestions('exam6')"></i>
                <i class="fas fa-trash" onclick="deleteQuestions('exam6')"></i>
            </div>
        </div>

        <!-- Add the remaining 4 exams similarly -->
        <!-- Placeholder for 7th - 10th exams -->

    </div>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- JavaScript functionality for CRUD operations -->
    <script>
        function createQuestion(examId) {
            alert('Create a question for ' + examId);
            // Here you can open a modal or redirect to the question creation page
        }

        function readQuestions(examId) {
            alert('Read questions for ' + examId);
            // Here you can show a list of questions in a modal or redirect to a page
        }

        function updateQuestions(examId) {
            alert('Update questions for ' + examId);
            // You can use a modal or redirect to a form to edit questions
        }

        function deleteQuestions(examId) {
            const confirmation = confirm('Are you sure you want to delete questions for ' + examId + '?');
            if (confirmation) {
                alert('Questions deleted for ' + examId);
                // Here you can implement an API call to delete questions from the backend
            }
        }
    </script>

</body>
</html>
