		   <h1>De 'To Do'-app</h1>
			   <div class="errors"><?php if(isset($_SESSION['notification'])){
	              echo($_SESSION['notification']);
	              unset($_SESSION['notification']);
	            }?>
	          </div>
		   	<p><a href="http://localhost/workingspace/Labo-PHP/todo/voegtoe">Voeg item toe</a></p>
	     	<?php if (!empty($alGedaan) || !empty($nogTeDoen)): ?>
	     		<h2>Wat moet er allemaal gebeuren?</h2>
	     		<h3>To do</h3>
    			<?php if(!empty($nogTeDoen)): ?>
    				<ul>
    					<?php foreach($nogTeDoen as $key => $value): ?>
    						<li>
    							<span class='todolist'>
    								<a href="http://localhost/workingspace/Labo-PHP/todo/verplaatsItem/<?= $nogTeDoen[$key]['id'] . '/' . $nogTeDoen[$key]['actief']  ?>">
    								<img src="http://localhost/workingspace/labo-php/public/images/icon-check.png">
    								</a>
    							</span>
    							<span class=''><?= $nogTeDoen[$key]['taak'] ?></span>
    							<span class='todolist'>
     								<a href="http://localhost/workingspace/Labo-PHP/todo/deletetaak/<?= $nogTeDoen[$key]['id'] . '/' . $nogTeDoen[$key]['actief']  ?>">
    								<img src="http://localhost/workingspace/labo-php/public/images/icon-delete.jpg">
    								</a>
    							</span>
    						</li>
    					<?php endforeach; ?>
			   		</ul>

		   		<?php else: ?>
		    		<p>Allright, all done!</p>
				<?php endif; ?>
				<h3>Done</h3>
					   <?php if(!empty($alGedaan)): ?>

	    					<ul>
		    					<?php foreach($alGedaan as $key => $value): ?>
		    						<li>
		    							<span class='todolist'>
		    								<a href="http://localhost/workingspace/Labo-PHP/todo/verplaatsItem/<?= $alGedaan[$key]['id'] . '/' . $alGedaan[$key]['actief']  ?>">
		    								<img src="http://localhost/workingspace/labo-php/public/images/icon-check.png">
		    								</a>
		    							</span>
		    							<span class=''><?= $alGedaan[$key]['taak'] ?></span>
		    							<span class='todolist'>
										<a href="http://localhost/workingspace/Labo-PHP/todo/deletetaak/<?= $alGedaan[$key]['id'] . '/' . $alGedaan[$key]['actief']  ?>">
		    								<img src="http://localhost/workingspace/labo-php/public/images/icon-delete.jpg">
		    								</a>
		    							</span>
		    						</li>
		    					<?php endforeach; ?>
			   				</ul>
			   <?php else: ?>
			   		<p>Damn, werk aan de winkel...</p>
				<?php endif; ?>
			<?php else: ?>
			    <p>Nog geen todo-items.</p>
			<?php endif; ?>
		</div> <!-- einde container -->
 	</body>
</html>