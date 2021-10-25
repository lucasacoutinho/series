echo '----Qualidade Codigo----'
vendor/phpmd/phpmd/src/bin/phpmd "app" text phpmd.xml --exclude "*app/Providers/*.php"
if [ $? -ne 0 ]
then
  exit 2
fi
