       <h1>Voeg een TODO-item toe</h1>

       <?php echo form_open('uploaditem'); ?>
        <ul>
         <li><label for="nieuwItem">Wat moet er gedaan worden?</label></li>
         <li> <input type="text" size="20" id="nieuwItem" name="nieuwItem"/></li>
         <li><input type="submit" value="Voeg toe"/></li>
       </ul>
       </form>
    </div> <!-- einde container -->
  </body>
</html>
