<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>
    <?php
    //define variables and set to empty values
    $namaErr = $emailErr = $genderErr = $websiteErr = "";
    $nama = $email = $gender = $comment = $website = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama"])) {
            $namaErr = "Nama Harus Diisi";
        } else {
            $nama = test_input($_POST["nama"]);
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email Harus Diisi";
    } else {
        $email = test_input($_POST["email"]);

        //check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Email Tidak Sesuai Format";
        }
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender Harus Dipilih";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>Posting Komentar</h2>

    <p><span class="error">* Harus Diisi</span></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>Nama : </td>
                <td><input type=" text" name="nama" id="nama">
                    <span class="error"><?php echo $namaErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Email : </td>
                <td><input type="text" name="email" id="email">
                    <span class="error"><?php echo $emailErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Website : </td>
                <td><input type="text" name="website" id="website">
                    <span class="error"><?php echo $websiteErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Komentar : </td>
                <td><textarea name="comment" rows="5" cols="40" id="comment"></textarea></span>
                </td>
            </tr>
            <tr>
                <td>Gender : </td>
                <td>
                    <input type="radio" name="gender" value="L">Laki-Laki
                    <input type="radio" name="gender" value="P">Perempuan
                    <span class=" error"><?php echo $genderErr; ?></span>
                </td>
            </tr>

            <td>
                <input type="submit" name="submit" value="Submit">
            </td>
        </table>
    </form>
    <div><strong><a href="table.php">::Lihat Data::</a></strong></div>

    <?php
    echo "<head><title>Hasil Data</head></title>";

    $fp = fopen("hasil.txt", "a+");
    fputs($fp, "$nama|$email|$website|$comment|$gender\n");
    fclose($fp);

    echo $nama;
    echo "<br>";

    echo $email;
    echo "<br>";

    echo $website;
    echo "<br>";

    echo $comment;
    echo "<br>";

    echo $gender;
    ?>
</body>

</html>