       <h1>Login</h1>
       <div class="errors"><?php echo validation_errors(); ?></div>
       <?php echo form_open('Verifylogin'); ?>
         <label for="username">Username:</label>
         <input type="text" size="20" id="username" name="username"/>
         <br/>
         <label for="password">Password:</label>
         <input type="password" size="20" id="password" name="password"/>
         <br/>
         <input type="submit" value="Login"/>
       </form>
    </div> <!-- einde container -->
  </body>
</html>
