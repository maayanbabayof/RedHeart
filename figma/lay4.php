<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css%22%3E">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/style.css">
  <title>Document</title>
</head>

<body>

  <a href="index.html" id="logo">Logo</a>
  <div class="redheart">
    <p><b><span class="red">Red</span><span class="heart">Heart</span></b></p>
  </div>
  <div id="nurse"></div>
  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#ea6f6f" class="bi bi-envelope"
    viewBox="0 0 16 16">
    <path
      d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
  </svg>
  <div id="name">
    <h5>אסתר אלימלך</h5>
    <h6>התנתקות</h6>
  </div>
  <div id="wrapper">
    <header id="header4">
      <nav id="nav">
        <ul>
          <li><a class="active" href="#">יצירת קמפיין</a></li>
          <li><a href="lay3.html">קמפיינים קיימים <span class="circle">7</span></a></li>
          <li><a href="index.html">מאגר מנות</a></li>
          <li><a href="index.html"><i class="material-icons">home</i></a></li>
        </ul>
      </nav>
    </header>
    <main class="mainContainer4">
      <div id="image4"></div>
      <div class="breadCrumbs">
        <span><a href="index.html" style="color: blue; margin-right: 10px;"> דף הבית</a></span>
        <span style="color: #5f5f5f;">/ יצירת קמפיין</span>
      </div>
      <h1><b>צורך בדם</b></h1>
      <p>:הכניסו את הפרטים אודות הקמפיין אותו תרצו ליצור</p>
      <div class="formContainer">
        <form action="tempfigma.php" method="get" class="row g-3 needs-validation" novalidate>
          <fieldset>
            <div class="mb-3">
              <label for="nameN" class="form-label"> שם האחות:</label>
              <input name="nurse" type="text" id="nameN" class="form-control" placeholder="שם האחות" required>
            </div>
            <div class="mb-3">
              <label for="campN" class="form-label"> שם הקמפיין:</label>
              <input name="name" type="text" id="campN" class="form-control" placeholder="שם הקמפיין" required>
            </div>
            <div class="mb-3">
              <label for="needs" class="form-label">צורך:</label>
              <textarea name="need" class="form-control" id="needs" rows="3" required></textarea>
            </div>
            <div class="mb-3">
              <label for="type-B" class="form-label">סוג הדם:</label>
              <select name="kind" id="type-B" class="form-select" required>
                <option value="">בחר סוג דם</option>
                <option value="+A">+A</option>
                <option value="-A">-A</option>
                <option value="+B">+B</option>
                <option value="-B">-B</option>
                <option value="+AB">-AB</option>
                <option value="-AB">+AB</option>
                <option value="+O">+O</option>
                <option value="-O">-O</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="count" class="form-label">כמות נדרשת:</label>
              <select name="sum" id="count" class="form-select" required>
                <option value="">בחר כמות</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="150">150</option>
                <option value="200">200</option>
                <option value="250">250</option>
                <option value="300">300</option>
                <option value="350">350</option>

              </select>
            </div>
            <div class="mb-3">
              <label for="until" class="form-label">תאריך יעד:</label>
              <input type="date" id="until" class="form-select" name="date" required>
            </div>
            <div class="mb-3 form-check">
              <input name="check" type="checkbox" class="form-check-input" id="exampleCheck1" required>
              <label class="form-check-label" for="exampleCheck1">אני מאשר/ת את הפרטים</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </fieldset>
        </form>
      </div>

    </main>

  </div>
  <script src="js/java.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js%22%3E"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js%22%3E"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js%22%3E"></script>
</body>

</html>