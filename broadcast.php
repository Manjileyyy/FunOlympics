<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/casting.css">
    
    <title>Welcome </title>
</head>

<body>

<div class=" container center">
<div class="header">
        Choose your game interests
         </div>

<form action="#" method="" >
<select name="language" class="custom-select" multiple>
  <option>Basketball</option>
  <option>Football</option>
  <option>Luge</option>
  <option>Skiing</option>
  <option>Curling</option>
  <option>Bobsleigh</option>
  <option>IceSkating</option>

</select>
</form>
</div>
<div class="game-list-item">
<a href="./home.php">
<button class = "game-list-item-button" >Next</button> 
</a>
</div>

</body>
</html>

<script>
   class CustomSelect {
  constructor(originalSelect) {
    this.originalSelect = originalSelect;
    this.customSelect = document.createElement("div");
    this.customSelect.classList.add("select");

    this.originalSelect.querySelectorAll("option").forEach((optionElement) => {
      const itemElement = document.createElement("div");

      itemElement.classList.add("select__item");
      itemElement.textContent = optionElement.textContent;
      this.customSelect.appendChild(itemElement);

      if (optionElement.selected) {
        this._select(itemElement);
      }

      itemElement.addEventListener("click", () => {
        if (
          this.originalSelect.multiple &&
          itemElement.classList.contains("select__item--selected")
        ) {
          this._deselect(itemElement);
        } else {
          this._select(itemElement);
        }
      });
    });

    this.originalSelect.insertAdjacentElement("afterend", this.customSelect);
    this.originalSelect.style.display = "none";
  }

  _select(itemElement) {
    const index = Array.from(this.customSelect.children).indexOf(itemElement);

    if (!this.originalSelect.multiple) {
      this.customSelect.querySelectorAll(".select__item").forEach((el) => {
        el.classList.remove("select__item--selected");
      });
    }

    this.originalSelect.querySelectorAll("option")[index].selected = true;
    itemElement.classList.add("select__item--selected");
  }

  _deselect(itemElement) {
    const index = Array.from(this.customSelect.children).indexOf(itemElement);

    this.originalSelect.querySelectorAll("option")[index].selected = false;
    itemElement.classList.remove("select__item--selected");
  }
}

document.querySelectorAll(".custom-select").forEach((selectElement) => {
  new CustomSelect(selectElement);
});

</script>
<style>
  .select {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    max-width: 300px;
    gap: 10px;
  }
  
  .select__item {
    cursor: pointer;
    font-family: "Heebo", sans-serif;
    text-align: center;
    border-radius: 3px;
    background: #2b2b2b;
    border-radius: 10px;
    padding:10px 20px;
    color: white;
    transition: all 0.3s;
    font-size:16px;
    border: 2px solid transparent;
  }


  .select__item:hover{
    color:#2b2b2b;
    background-color:transparent !important;;
    border-color:#2b2b2b;
  }
  
  .select__item--selected {
    background: #009578;
    color: #ffffff;
  }


  body{
    margin: 0;
    padding: 0;
    background:white;
    height: 100vh;
    overflow: hidden;
    font-family: 'Noto Sans TC', sans-serif;
    display:flex;
    justify-content:space-between;
    flex-direction:column;
    align-items:center;

   }


   body  button{
    padding:10px 20px;
    background-color: #2b2b2b;
    border-radius:5px;
    margin:150px 0;
    color:#f8f8f8;
    font-size:20px;
    cursor:pointer;

   }
   .center{
    width: 550px;
    position: relative;
   }
   .center form{
    position: absolute;
    background: white;
    width: 100%;
    height: 350%;
    box-sizing: border-box;
    border: 1px solid #4b434c;
    border-radius: 0 0 5px 5px;
   }
   .center .header{
    font-size: 20px;
    font-weight: bold;
    color: white;
    background: #606b64;
    border-radius: 5px 5px 0 0;
   }

   .game-list-item{

   }
  
  </style>
