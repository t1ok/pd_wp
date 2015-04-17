PROJECT=anarchy-wp-theme
TARGET="$(PROJECT)-$(shell date +%F-%H%M%S)-git$(shell git describe --always).zip"
PWD=$(shell pwd)
PREFIX=./www/wp-content/themes

$(TARGET):
	@echo "  ZIP $@"
	@cd $(PREFIX) && zip $(PWD)/$@ -r anarchy > /dev/null
