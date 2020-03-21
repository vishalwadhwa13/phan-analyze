REPO := "phan/phan"
RELEASE := $(shell curl -s "https://api.github.com/repos/$(REPO)/releases/latest" | grep 'tag_name' | cut -d'"' -f4)
build:
	docker build --force-rm --rm --build-arg RELEASE=$(RELEASE) -t phan-docker:$(RELEASE) -t phan-docker .

generate_stubs:
	sh generate_stubs.sh $(RELEASE)

clean:
	rm -rf tmp
