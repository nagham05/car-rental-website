<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=">
  <title> Contact Us </title>
  <script src="https://kit.fontawesome.com/c32adfdcda.js" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="supstyle.css">
 
</head>
<body>
  
<section>
    
    <div class="section-header">
      <div class="container">
        <h2>Contact Us</h2>
        <p>"Like stars in the night sky, your messages illuminate our path. Reach out and let your light guide us."</p>
      </div>
    </div>
    
    <div class="container">
      <div class="row">
        
        <div class="contact-info">
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-home"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Address</h4>
              <p>Lebanon,saida<br/> Riyad Soloh street <br/></p>
            </div>
          </div>
          
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-phone"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Phone</h4>
              <p>07723451</p>
            </div>
          </div>
          
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-envelope"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Email</h4>
             <p>Drivedream@email.com</p>
            </div>
          </div>

        </div>
        
        <div class="contact-form">
          <form action="addmess.php" id="contact-form" method="post">
            <h2>Send Message</h2>
            <div class="input-box">
              <input type="text" required="true" name="name">
              <span>Full Name</span>
            </div>
            
            <div class="input-box">
              <input type="email" required="true" name="email">
              <span>Email</span>
            </div>
            
            <div class="input-box">
              <textarea required="true" name="message"></textarea>
              <span>Type your Message...</span>
            </div>
            
            <div class="input-box">
              <input type="submit" value="Send" name="">
            </div>
          </form>
        </div>
       <a href="index.php"><button type="button">Back to Home</button></a> 
      </div>
    </div>
   
  </section>
  
  
</body>
</html>
