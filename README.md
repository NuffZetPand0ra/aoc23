# AOC 2021

## Set up

First, run `composer install`!

You can either copy .config.sample -> .config, and fill in the appropiate values. You can also use the cli tool by calling `php rudolf setup` from your command line.

## CLI tool (rudolf)

Small cli tool included for convinience. Can show current scoreboard, and create boilerplate for new days.

### Setup
```
php rudolf setup
```
Command to set up config file.

### Creating a new day

To make boilerplate for a new day, you can use the cli tool "rudolf". Ie. to make boilerplate for day 21, call in your command line.

```cli
php rudolf dawn -d 21
```

This will create a solve.php file ready for your solution, as well as an input file with your input for that day.

Will also display a link to the days task in your command line, so you can get straight to solving!

### Showing scoreboard

```cli
php rudolf score
```
Shows current score from private leaderboard.