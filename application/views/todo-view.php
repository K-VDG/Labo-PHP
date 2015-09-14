		   <h1>De 'To Do'-app</h1>
		   	<p><a href="todo/voegtoe">Voeg item toe</a></p>
	     	<?php if (!empty($alGedaan) || !empty($nogTeDoen)): ?>
	     		<h2>Wat moet er allemaal gebeuren?</h2>
	     		<h3>To do</h3>
    			<?php if(!empty($nogTeDoen)): ?>
    				
    				<ul>
    					<?php foreach($nogTeDoen as $key => $value): ?>
    						<li>
    							<span class='todolist'>
    								<a href="http://localhost/workingspace/Labo-PHP/index.php/todo/verplaatsItem/<?= $nogTeDoen[$key]['id'] . '/' . $nogTeDoen[$key]['actief']  ?>">
    								<img src="http://localhost/workingspace/labo-php/public/images/icon-check.png">
    								</a>
    							</span>
    							<span class=''><?= $nogTeDoen[$key]['taak'] ?></span>
    							<span class='todolist'>
     								<a href="http://localhost/workingspace/Labo-PHP/index.php/todo/deletetaak/<?= $nogTeDoen[$key]['id'] . '/' . $nogTeDoen[$key]['actief']  ?>">
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
		    								<a href="http://localhost/workingspace/Labo-PHP/index.php/todo/verplaatsItem/<?= $alGedaan[$key]['id'] . '/' . $alGedaan[$key]['actief']  ?>">
		    								<img src="http://localhost/workingspace/labo-php/public/images/icon-check.png">
		    								</a>
		    							</span>
		    							<span class=''><?= $alGedaan[$key]['taak'] ?></span>
		    							<span class='todolist'>
										<a href="http://localhost/workingspace/Labo-PHP/index.php/todo/deletetaak/<?= $alGedaan[$key]['id'] . '/' . $alGedaan[$key]['actief']  ?>">
		    								<img src="http://localhost/workingspace/labo-php/public/images/icon-delete.jpg">
		    								</a>
		    							</span>
		    						</li>
		    					<?php endforeach; ?>
			   				</ul>
			   <?php else: ?>
			   		<p>Nog geen todo-items.</p>
				<?php endif; ?>
			<?php else: ?>
			    <p>Damn, werk aan de winkel...</p>
			<?php endif; ?>
		</div> <!-- einde container -->
 	</body>
</html>