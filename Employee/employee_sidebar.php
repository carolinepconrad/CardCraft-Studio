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
    color: #ffffff;
    padding: 20px 0px;
    margin-top: 10px;
    margin-left:15px;

  }

  .formstyle {
    display: flex;
    flex-direction: column;
    gap: 15px;
  }

  .formstyle label {
    font-size: 1em;
    color: black;
    margin-bottom: 5px;
    font-family: 'Space Grotesk', sans-serif;

  }

  .formstyle select {
    padding: 8px;
    width: 250px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 15px;
    background-color: #ffffff;
    color: black;
    font-family: 'Space Grotesk', sans-serif;

  }

  .formstyle select:focus {
    outline: none;
    border-color: #1c1e1c;

  }

  .formstyle button {
    padding: 10px 20px;
    font-family: 'Space Grotesk', sans-serif;
    background-color: #5C4033	;
    border: none;
    border-radius: 15px;
    width:250px;
    color: white;
    font-size: 1em;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .formstyle button:hover {
    background-color: #1d1306;
  }
</style>


</style>
 <nav class="sidebar">
<form action="search_catalog.php" method="get" class="formstyle">
  <div>
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

   
    </nav>
    </body>
    </html>