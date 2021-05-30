
						  </tbody>
						</table>
						<?php 
						navigator($page['current'],$page['pagNum'],$page['record']);
						?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	</body>
</html>


<?

$conn->close();

