<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<style>
   body {
    margin: 0;
    font-family: Arial, sans-serif;
  }

  .sidebar {
    position: sticky;
    top: 0;
    width: 250px;
    height: 100vh;
    color: #ffffff;
    padding: 20px 10px;
  }

  .sidebar h2 {
    padding-top: 10px;
    font-size: 1.5em;
    color: #ffcc00;
    margin-bottom: 20px;
    text-align: center;
  }

  .sidebar ul {
    list-style-type: none;
    padding: 0;
  }

  .sidebar ul li {
    margin: 20px 0;
  }

  .formstyle {
    display: flex;
    flex-direction: column;
    gap: 15px;
  }

  .formstyle label {
    font-size: 1em;
    color: #ffffff;
    margin-bottom: 5px;
  }

  .formstyle select {
    padding: 8px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f7f7f7;
    color: black;
  }

  .formstyle select:focus {
    outline: none;
    border-color: #ffcc00;
  }

  .formstyle button {
    padding: 10px 15px;
    background-color: #074030;
    border: none;
    border-radius: 5px;
    color: #1c1e1c;
    font-size: 1em;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .formstyle button:hover {
    background-color: #e6b800;
  }
</style>


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