<?
	class piePagina
	{
		private static $instancia = null;
		private function piePagina()
		{
			?>
            	<style>
                footer {
                background-color: black;
                position: absolute;
                bottom: 0;
                width: 100%;
                color: black;
                }
                </style>
                <footer position ="absolute" bottom="0"  style="width:100%; margin-left: 0px;"  >

                <div class="copyright" style="background-color: #FAD174;">
                    <div class="container-fluid" style="background-color: #FAD174;">
                        Integrantes: Chumpitaz Rodriguez, Renzo Fernando / Berrocal Anchante, Alfredo 
                            / Gonzales Mallma Erick Anderson / Bernedo Acosta, Bruno Eduardo 
                            / Garay Pastrana, Jeanpier Miguel
                    </div>
                </div>
                </footer>
           	<?	
		}	
		public static function getPiePagina()
		{
			if(self::$instancia == null)
				self::$instancia = new piePagina();
			return(self::$instancia);	
		}
	}
?>