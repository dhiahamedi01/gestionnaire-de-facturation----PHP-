<!DOCTYPE html>
<html lang="ar" dir="rtl">
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <nav>
         <div class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
            muha<span>sabe</span>
         </div>

      </nav>


      <form enctype="multipart/form-data" action="login process.php" class="form" method="POST">
        <section class="container">
          <h1> تسجيل الدخول</h1><br>
                <div class="input-box">
                  <label> اسم المستخدم</label>
                  <input type="text" placeholder="" name="username" required />
                </div>
        
                <div class="column">
                  <div class="input-box">
                    <label> كلمة المرور </label>
                    <input type="password" placeholder="" name="password" required />
                  </div>
                </div><br><br><br>

                
                <button type="submit" name="login">الدخول</button>
                
              </form>

      <script>
         const menuBtn = document.querySelector(".menu-icon span");
         const searchBtn = document.querySelector(".search-icon");
         const cancelBtn = document.querySelector(".cancel-icon");
         const items = document.querySelector(".nav-items");
         const form = document.querySelector("form");
         menuBtn.onclick = ()=>{
           items.classList.add("active");
           menuBtn.classList.add("hide");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
         cancelBtn.onclick = ()=>{
           items.classList.remove("active");
           menuBtn.classList.remove("hide");
           searchBtn.classList.remove("hide");
           cancelBtn.classList.remove("show");
           form.classList.remove("active");
           cancelBtn.style.color = "#ff3d00";
         }
         searchBtn.onclick = ()=>{
           form.classList.add("active");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
      </script>
   </body>
</html>