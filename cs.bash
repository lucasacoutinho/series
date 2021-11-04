echo '----Qualidade Codigo----'
vendor/bin/phpcs
if [ $? -ne 0 ]
then
  exit 2
fi
