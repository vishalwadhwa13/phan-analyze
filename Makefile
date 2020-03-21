REPO := "phan/phan"
RELEASE := $(shell curl -s "https://api.github.com/repos/$(REPO)/releases/latest" | grep 'tag_name' | cut -d'"' -f4)
build:
	docker build --force-rm --rm --build-arg RELEASE=$(RELEASE) -t phan-docker:$(RELEASE) -t phan-docker .

# Use this if stubs are available and enabled in php cli
generate_stubs:
	sh generate_stubs.sh $(RELEASE)

# Use this if you want phpstorm stubs
get_stubs:
	sh get_stubs.sh

clean:
	rm -rf tmp
