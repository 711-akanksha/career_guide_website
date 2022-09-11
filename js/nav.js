//create a nav function called createnavbar
const createNav =  () =>{ 
    let nav= document.querySelector('.header-bar');
    nav.innerHTML= `
    
    <div class="logo-bar ">
    <div>
    <a href="/html/home.html">
      <span class="brand-logo">  CareerDirections<span> <br>
      </a>
    </div>
   <div class="seperate-item">
      <div class="search-bar">
          <input type="text" class="search-box" placeholder="search your item">
          <button class ='search-btn'>search</button>
      </div>
      <div class="nav-wap">
         <ul class="nav-list">
        
         <li><a href="/html/sign-in.html"> sign-in</a></li>
         <li> 
         <div class ="register-sign-in">
          <li>
          <a href="/html/sign_up.html">
            <button class=" register-sign-in-btn">join US</button>
            </a>
          </li>
          </div>
          </ul>
     </div>
  </div>
</div>

     `; 
} 
createNav();