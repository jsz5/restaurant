<!--
Zmieniłem to kompletnie xD
Olso - jeśli kolory są zdefiniowane, bo w którymś z plików widziałem
W sensie primary, secondary itd, to czemu ktoś tutaj zrobił customowy x_x
-->

<template>
	 <v-footer class="v-footer">
		<v-footer id="v-footer">
			<p class="copyright">&copy; SmartRestraunt 2019. Design: <a href="https://github.com/Luzkan">xD</a>.</p>
		</v-footer>
	</v-footer> 
</template>

<script>
  export default {
    name: "ui-footer"
  }
</script>

<style scoped>

	#v-footer {
		display: block;
		margin: 0;
		padding: 0;
		border: 0;
		font-size: 100%;
		font: inherit;
		transition: transform 0.325s ease-in-out, filter 0.325s ease-in-out, opacity 0.325s ease-in-out;
		width: 100%;
		max-width: 100%;
		margin-top: 2rem;
		text-align: center;
	}

		#v-footer .copyright {
			letter-spacing: 0.2rem;
			font-size: 0.6rem;
			opacity: 0.75;
			margin-bottom: 0;
			text-transform: uppercase;
			padding-bottom: 20px;
		}

		body.is-article-visible #v-footer {
			transform: scale(0.95);
			filter: blur(0.1rem);
			opacity: 1;
		}

		body.is-preload #v-footer {
			opacity: 1;
		}

	/* Nie wiem gdzie ten pliczek, nk to po prostu stamtąd wyrzuci */
	.theme--dark.v-footer {
		background-color: transparent !important; 
	}

	.theme--dark.v-sheet {
		background-color: transparent !important;
	}
	.theme--dark.v-footer {
		background-color: transparent !important;
	}
	.theme--dark.v-sheet {
		background-color: transparent !important;
	}

</style>