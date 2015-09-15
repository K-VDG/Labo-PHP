		   <h1>Dashboard</h1>
		   <div class="errors"><?php if(isset($_SESSION['notification'])){
		          echo($_SESSION['notification']);
		          unset($_SESSION['notification']);
       			}?>
       		</div>
		   <p>Klik <a href="todo">hier</a> om naar je persoonlijke to do-lijst te gaan</p>
		</div> <!-- einde container -->
 	</body>
</html>