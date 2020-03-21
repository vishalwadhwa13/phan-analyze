# Phan Setup

Setting up phan analyzer for debian 8 (php7.0)

1. Install docker
2. Build docker image (`make`). The image size is around `100MB` (just few `MBs` over the original `php7.4-alpine` image)
3. Symlink `run.sh` to `phan` in `~/bin` and source `~/bin`
4. Hardlink `.phan` directory to project root if you want to sync changes with this directory otherwise you can just do a normal copy (Hardlink: `cp -lr .phan $PROJECT_ROOT`)

### Analyzing
`phan --include-analysis-file-list path/to/file.php`

> Note: Since, phan is very memory intensive, it is advisable to setup some swap space on low memory systems.

### Setting up githook
```
DIFF_FILES=`git diff --cached --name-only --diff-filter=ACMR HEAD | grep \\.php`

echo '***** Running Phan Static Code Analyzer on diff files *****'
phan --include-analysis-file-list $DIFF_FILES
exit $?
```

### Getting stubs
There are two ways to generate stubs. Both of them copy stubs to `.phan/stubs`

#### Generating
- Use `make generate_stubs` to generate stubs for extensions which are present in `stublist.txt` and are enabled in `php` installed on your system.

#### Fetching
- Other way is to use [phpstorm-stubs](https://github.com/JetBrains/phpstorm-stubs) from JetBrains
- Running `make get_stubs` will fetch available stubs from `stublist.txt`

### Stopping analysis
> Note: `C-c` doesn't work. 
1. Stop the container (`docker stop phan-analyze`)
2. Remove the container (`docker rm phan-analyze`)
