<?php 
$stylesheet = '<link rel="stylesheet" href="../styles/main.css">';
$extraStyles = '<link rel="stylesheet" href="../styles/signup.css">';
$music = '<h5>Astral Observatory Ambiance: <br><br>
    <audio src="../media/astral-observatory.mp4" controls style="width: 100px;"></audio></h5>';
$headerText1 = '<h1>Now it\'s Your Turn!</h1>';
$headerText2 = '<h2>Share your story</h2>';

require '../includes/header.php';

$comments = '';
$title = '';
$missing = [];

if (isset($_SESSION['username'], $_SESSION['folder'], $_SESSION['email'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $folder = preg_replace("/[^a-zA-Z0-9_-]/", "", $_SESSION['folder']);
        $email = filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL);
        require_once ('../../../../pdo_connect.php');

        // Validate comments
        if (!empty($_POST['comments'])) {
            $comments = htmlspecialchars(trim($_POST['comments']));
        } else {
            $missing['comments'] = "Please write a story.";
        }
		
		// Title required
		if (!empty($_POST['title'])) {
			$title = htmlspecialchars(trim($_POST['title']));
		} else {
			$missing['title'] = "Please give a title.";
		}

        // Validate file
        $name = null;
        $type = null;
        if (!isset($_FILES['upload']) || $_FILES['upload']['error'] === UPLOAD_ERR_NO_FILE) {
            $missing['file'] = "Please upload a file.";
        } else {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $fileTmp = $_FILES['upload']['tmp_name'];
            $fileType = mime_content_type($fileTmp);
            $originalName = basename($_FILES['upload']['name']);
            $safeName = uniqid('upload_', true) . "_" . preg_replace("/[^a-zA-Z0-9_\.-]/", "_", $originalName);
            $uploadDir = "../../../../MPO_uploads/$folder";
            $targetPath = "$uploadDir/$safeName";

            if (in_array($fileType, $allowedTypes)) {
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                if (move_uploaded_file($fileTmp, $targetPath)) {
                    $name = $safeName;
                    $type = $fileType;
                } else {
                    $missing['upload_fail'] = "File could not be saved.";
                }
            } else {
                $missing['wrong_file'] = "Please upload a valid GIF, JPEG, or PNG.";
            }
        }

        // If no errors, insert into DB
        if (empty($missing)) {
            $sql = "INSERT INTO MPO_user_uploads (email, fileName, fileType, title, comments) VALUES (?, ?, ?, ?, ?)";
            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(1, $email);
            $stmt->bindParam(2, $name);
            $stmt->bindParam(3, $type);
			$stmt->bindParam(4, $title);
            $stmt->bindParam(5, $comments);
            $stmt->execute();

            echo "<section><h2>Your story has been saved!<h2>";
            if ($name)
				echo "<h2>The file " . htmlspecialchars($originalName) . " was uploaded too!";
            echo "</h2></section>";
			// insert link to view post page
            include '../includes/footer.php';
            exit;
        }
    }
} else {
    echo "<section><h2>You must be logged in as a registered user to upload documents.</h2>
          <h3>Use the Register link to create an account.</h3></section>";
    include '../includes/footer.php';
    exit;
}
?>

<section>
    <h2>Upload a story from your universe!</h2>
    <form enctype="multipart/form-data" action="index.php" method="post">
        <fieldset>
            <legend>Select a GIF, JPEG, or PNG file to be uploaded:</legend>
			
			<?php 
            if (isset($missing['title'])) echo '<h3 style="color: red">' . htmlspecialchars($missing['title']) . '</h3>';
            ?>
			Title:<br>
			<input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title); ?>"><br><br>
			
            <?php 
            foreach (['file', 'wrong_file', 'upload_fail'] as $error) {
                if (isset($missing[$error])) {
                    echo '<h3 style="color: red">' . htmlspecialchars($missing[$error]) . '</h3>';
                }
            }
            ?>
            File:<br>
            <input type="file" name="upload" id="file" accept=".gif,.jpeg,.jpg,.png"><br><br>

            <?php 
            if (isset($missing['comments'])) echo '<h3 style="color: red">' . htmlspecialchars($missing['comments']) . '</h3>';
            ?>
            Your Story:<br>
            <textarea name="comments" id="comments" rows="20" cols="50"><?php echo htmlspecialchars($comments); ?></textarea><br><br>

            <input type="submit" name="submit" value="Submit" id="submit">
        </fieldset>
    </form>
    <br>
<?php include '../includes/footer.php'; ?>
