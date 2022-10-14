default: docker_build

    docker_build:
		IMAGE_NAME="eusoumarlon/adminer:local" sh ./hooks/build
