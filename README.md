# line-webhook

LINE Webhook echo reply

## Set up

* Create a web space on [Heroku](https://www.heroku.com/)
* Create a line bot on [Line Developers](https://developers.line.me/en/)

```
$ git remote add heroku [your heroku repository]
$ heroku config:set CHANNEL_ACCESS_TOKEN=[your line bot access token]
$ git push heroku
```
![ScreenShot](https://i.imgur.com/68Q0Hbsl.png)
