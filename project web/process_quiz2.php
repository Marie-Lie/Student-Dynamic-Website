<?php
// Define correct answers
$correctAnswers = [
    'q1' => 'B',
    'q2' => 'D',
    'q3' => 'C',
    'q4' => 'False',
    'q5' => 'True',
    'q6' => 'world wide web',
    'q7' => 'cpu',
    'q8' => '<p>'
];

// Initialize score and results array
$score = 0;
$results = [];

// Check each answer
//Loop through each correct answer using the question name as the key
//$_POST[$question]: gets the user's submitted answer, 
//isset(...) ? ... : '': avoids errors if the answer wasn't submitted
foreach ($correctAnswers as $question => $correctAnswer) {
    $userAnswer = isset($_POST[$question]) ? strtolower(trim($_POST[$question])) : ''; 
    $correctAnswer = strtolower($correctAnswer);
    
    $isCorrect = ($userAnswer === $correctAnswer); //check user answer to see if it matches the correct answer
    $results[$question] = [
        'userAnswer' => htmlspecialchars($_POST[$question] ?? ''),
        'correctAnswer' => $correctAnswer,
        'isCorrect' => $isCorrect
    ];
    
    if ($isCorrect) {
        $score++;
    }
}

// Calculate percentage
$percentage = round(($score / count($correctAnswers)) * 100);

// Generate result HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz 2 Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #dceefb;
            padding: 20px;
            max-width: 800px;
            margin: auto;
        }
        .result-header {
            background: linear-gradient(135deg, #377be0 0%, #7e79d4 100%);
            color: white;
            text-align: center;
            padding: 30px 20px;
            margin-bottom: 20px;
            border-radius: 8px;
        }
        .result-header h1 {
            font-size: 2rem;
            margin: 0;
        }
        .score-display {
            font-size: 1.5rem;
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
        }
        .result-item {
            background: white;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .correct {
            border-left: 5px solid #28a745;
        }
        .incorrect {
            border-left: 5px solid #dc3545;
        }
        .answer-feedback {
            margin-top: 5px;
            font-style: italic;
        }
        .correct-answer {
            color: #28a745;
            font-weight: bold;
        }
        .user-answer {
            color: #dc3545;
            font-weight: bold;
        }
        .progress-container {
            width: 100%;
            background-color: #e0e0e0;
            border-radius: 5px;
            margin: 20px 0;
        }
        .progress-bar {
            height: 30px;
            background-color: #377be0;
            border-radius: 5px;
            width: <?php echo $percentage; ?>%;
            transition: width 0.5s;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="result-header">
        <h1>🧠 Quiz 2 Results</h1>
    </div>

    <div class="progress-container">
        <div class="progress-bar"><?php echo $percentage; ?>%</div>
    </div>

    <div class="score-display">
        You scored <?php echo $score; ?> out of <?php echo count($correctAnswers); ?>!
    </div>

    <?php foreach ($results as $question => $result): ?>
    <div class="result-item <?php echo $result['isCorrect'] ? 'correct' : 'incorrect'; ?>">
        <p><strong>Question <?php echo substr($question, 1); ?>:</strong></p>
        <?php if (!$result['isCorrect']): ?>
            <p class="answer-feedback">
                Your answer: <span class="user-answer"><?php echo $result['userAnswer']; ?></span><br>
                Correct answer: <span class="correct-answer"><?php echo $result['correctAnswer']; ?></span>
            </p>
        <?php else: ?>
            <p class="answer-feedback correct-answer">✓ Correct!</p>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>

    <div style="text-align: center; margin-top: 30px;">
        <a href="quiz2.html" style="background-color: #377be0; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Try Again</a>
    </div>
</body>
</html>