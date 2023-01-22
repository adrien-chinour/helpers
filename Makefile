DOCKER_IMAGE=ghcr.io/adrien-chinour/helpers

quality:
	composer run-script phpstan
	composer run-script ecsc

release:
	docker build . --file infra/Dockerfile --tag $(DOCKER_IMAGE)
	docker push $(DOCKER_IMAGE)
