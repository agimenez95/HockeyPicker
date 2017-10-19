create database if not exists hockey;
use hockey;
create user if not exists 'adminUser'@'localhost' identified by 'The password';
grant all on hockey.* to 'adminUser'@'localhost';

drop table if exists Customer;
create table Customer (
  id int not null auto_increment PRIMARY KEY,
  firstname varchar(25) not null,
  surname varchar(50) not null,
  DOB date not null,
  dateStarted datetime not null,
  email varchar(100) not null,
  username varchar(25) not null,
  pword varchar(60) not null,
  teamSupport int not null
);

drop table if exists Guess;
create table Guess (
  id int not null auto_increment PRIMARY KEY,
  customerID int not null,
  weekID int not null,
  bonusPlayerID int not null
);

drop table if exists Prediction;
create table Prediction (
  id int not null auto_increment PRIMARY KEY,
  matchupID int not null,
  guessID int not null
);

drop table if exists Matchup;
create table Matchup (
  id int not null auto_increment PRIMARY KEY,
  homeTeamID int not null,
  awayTeamID int not null,
  homeGoals int,
  awayGoals int,
  actualResult boolean DEFAULT FALSE,
  weekID int DEFAULT 1
);

drop table if exists Teams;
create table Teams (
  id int not null auto_increment PRIMARY KEY,
  name varchar(50) not null
);

insert into Teams(name) values("Carolina Hurricanes");
insert into Teams(name) values("Columbus Blue Jackets");
insert into Teams(name) values("New Jersey Devils");
insert into Teams(name) values("New York Islanders");
insert into Teams(name) values("New York Rangers");
insert into Teams(name) values("Philadelphia Flyers");
insert into Teams(name) values("Pittsburgh Penguins");
insert into Teams(name) values("Washington Capitals");
insert into Teams(name) values("Boston Bruins");
insert into Teams(name) values("Buffalo Sabres");
insert into Teams(name) values("Detroit Red Wings");
insert into Teams(name) values("Florida Panthers");
insert into Teams(name) values("Montréal Canadiens");
insert into Teams(name) values("Ottawa Senators");
insert into Teams(name) values("Tampa Bay Lightning");
insert into Teams(name) values("Toronto Maple Leafs");
insert into Teams(name) values("Chicago Blackhawks");
insert into Teams(name) values("Colorado Avalanche");
insert into Teams(name) values("Dallas Stars");
insert into Teams(name) values("Minnesota Wild");
insert into Teams(name) values("Nashville Predators");
insert into Teams(name) values("St. Louis Blues");
insert into Teams(name) values("Winnipeg Jets");
insert into Teams(name) values("Anaheim Ducks");
insert into Teams(name) values("Arizona Coyotes");
insert into Teams(name) values("Calgary Flames");
insert into Teams(name) values("Edmonton Oilers");
insert into Teams(name) values("Los Angeles Kings");
insert into Teams(name) values("San Jose Sharks");
insert into Teams(name) values("Vancouver Canucks");

drop table if exists BonusPlayer;
create table BonusPlayer (
  id int not null auto_increment PRIMARY KEY,
  name varchar(50) not null,
  teamID int not null
);

insert into BonusPlayer(name, teamID)
values
  ('Sidney Crosby', 7),
  ('Nikita Kucherov', 15),
  ('Auston Matthews', 16),
  ('Brad Marchand', 9),
  ('Vladimir Tarasenko', 22),
  ('Jeff Skinner', 1),
  ('Patrik Laine', 31),
  ('Max Pacioretty', 13),
  ('Cam Atkinson', 2),
  ('Patrick Kane', 17),
  ('David Pastrnak', 9),
  ('Anders Lee', 4),
  ('Evgeni Malkin', 7),
  ('Alex Ovechkin', 8),
  ('T.J. Oshie', 8),
  ('Richard Rakwell', 24),
  ('Mark Scheifele', 23),
  ('Jeff Carter', 28),
  ('Nazem Kadri', 16),
  ('Patrick Eaves', 24),
  ('Artemi Panarin', 17),
  ('Viktor Arvidsson', 21),
  ('Wayne Simmonds', 6),
  ('Connor McDavid', 27),
  ('Jonathan Machessault', 12),
  ('Leon Draisaitl', 27),
  ('Brent Burns', 29),
  ('Joe Pavelski', 29),
  ('James van Riemsdyk', 16);
