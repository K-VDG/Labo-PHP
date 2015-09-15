       <h1>Registreer</h1>
       <div class="errors"><?php if(isset($_SESSION['notification'])){
          echo($_SESSION['notification']);
          unset($_SESSION['notification']);
       }?></div>
       <?php echo form_open('RegistreerUser'); ?>
         <label for="username">Username:</label>
         <input type="text" size="20" id="username" name="username" value=""/>
         <br/>
         <label for="password">Password:</label>
         <input type="password" size="20" id="password" name="password" value=""/>
         <br/>
         <input type="submit" value="Registreer"/>
       </form>
    </div> <!-- einde container -->
  </body>
</html>
