<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<style>
    .sidebar {
    position: sticky;
    top: 0;
    width: 200px;
    height: 100vh;
    background-color: rgb(27, 29, 27);
    padding-top: 20px;
    padding-left: 10px;
  }
  
  .sidebar ul {
    list-style-type: none;
  }
  
  .sidebar ul li {
    margin: 20px;
    margin-left: 10px;
  }

</style>
 <nav class="sidebar">
      <ul>
      <h2>Search</h2>
<form action="a_search.php" method="get" class="formstyle">
  <div>
    <label for="color">Color:</label>
    <select id="color" name="color">
      <option value="">Select Color</option>
      <option value="white">White</option>
      <option value="red">Red</option>
      <option value="green">Green</option>
      <option value="blue">Blue</option>
      <option value="tan">Tan</option>
      <option value="pink">Pink</option>
      <option value="black">Black</option>
    </select>
  </div>

  <div>
    <label for="style">Style:</label>
    <select id="style" name="style">
      <option value="">Select Style</option>
      <option value="modern">Modern</option>
      <option value="simple">Simple</option>
      <option value="classic">Classic</option>
      <option value="abstract">Abstract</option>
      <option value="playful">Playful</option>
    </select>
  </div>

  <button type="submit">Search</button>
</form>

   
      </ul>
    </nav>
    </body>
    </html>