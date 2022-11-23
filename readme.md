# Setup docker as interpreter

- Go to settings -> Php
- Click 3 dots next to CLI interpreter
- Click plus top left, then choose docker
- Then choose new server, select docker for windows
  - leave defaults alone
- Select image that was build/should be used and contains the project files
![CLI Interpreter](images/Screenshot_20221122_021553.png)
![PHP Interpreter Setup](images/Screenshot_20221122_021458.png)

- Go to settings -> Php -> Test Frameworks
- Add new remote interpreter and close the server from the previous step
- Make sure project mappings and docker container mappings are correct
- Select "use composer autoloader"
- Set the "path to script" to the location of the autoloader file
![Test Framework Interpreter](images/Screenshot_20221123_122909.png)