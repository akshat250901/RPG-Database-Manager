CREATE TABLE Village (
    name VARCHAR(25) PRIMARY KEY,
    region VARCHAR(25) NOT NULL,
    population INTEGER NOT NULL,
    minLevel INTEGER NOT NULL
);

CREATE TABLE PetAbility(
    species VARCHAR(25) PRIMARY KEY,
    ability VARCHAR(25) NOT NULL
);

CREATE TABLE PetSpecies(
    name VARCHAR(25) PRIMARY KEY,
    species VARCHAR(25) NOT NULL,
    FOREIGN KEY (species) REFERENCES PetAbility(species)
    ON DELETE CASCADE
);

CREATE TABLE PlayableCharacter(
    username VARCHAR(25) PRIMARY KEY,
    class VARCHAR(25) NOT NULL,
    charLevel INTEGER NOT NULL,
    health INTEGER NOT NULL,
    energy INTEGER NOT NULL,
    attack INTEGER NOT NULL,
    defense INTEGER NOT NULL,
    speed INTEGER NOT NULL,
    pet VARCHAR(25),
    FOREIGN KEY (pet) REFERENCES PetSpecies(name)
    ON DELETE SET NULL
);

CREATE TABLE EquipmentRarity (
    name VARCHAR(25) PRIMARY KEY,
    rarity VARCHAR(25) NOT NULL
);

CREATE TABLE EquipmentType(
    affectedStat VARCHAR(25) PRIMARY KEY,
    type VARCHAR(25) NOT NULL
);

CREATE TABLE Sells (
    village VARCHAR(25),
    equipment VARCHAR(25),
    price INTEGER NOT NULL,
    PRIMARY KEY (village, equipment),
    FOREIGN KEY (village) REFERENCES Village(name)
    ON DELETE CASCADE,
    FOREIGN KEY (equipment) REFERENCES EquipmentRarity(name)
    ON DELETE CASCADE
);

CREATE TABLE EquipmentAffectedStat (
    name VARCHAR(25) PRIMARY KEY,
    affectedStat VARCHAR(25) NOT NULL,
    FOREIGN KEY (name) REFERENCES EquipmentRarity(name)
    ON DELETE CASCADE,
    FOREIGN KEY (affectedStat) REFERENCES EquipmentType(affectedStat)
    ON DELETE CASCADE
);

CREATE TABLE EquipmentUser (
    name VARCHAR(25) PRIMARY KEY,
    usedBy VARCHAR(25),
    FOREIGN KEY (name) REFERENCES EquipmentRarity(name)
    ON DELETE CASCADE,
    FOREIGN KEY (usedBy) REFERENCES PlayableCharacter(username)
    ON DELETE SET NULL
);

CREATE TABLE EquipmentName (
    rarity VARCHAR(25),
    affectedStat VARCHAR(25),
    name VARCHAR(25) NOT NULL,
    PRIMARY KEY (rarity, affectedStat),
    FOREIGN KEY (name) REFERENCES EquipmentRarity(name)
    ON DELETE CASCADE,
    FOREIGN KEY (affectedStat) REFERENCES EquipmentType(affectedStat)
    ON DELETE CASCADE
);

CREATE TABLE EquipmentStatBoost (
    rarity VARCHAR(25),
    affectedStat VARCHAR(25),
    statBoost INTEGER NOT NULL,
    PRIMARY KEY (rarity, affectedStat),
    FOREIGN KEY (affectedStat) REFERENCES EquipmentType(affectedStat)
    ON DELETE CASCADE
);

CREATE TABLE DungeonDifficulty (
    name VARCHAR(25) PRIMARY KEY,
    difficulty INTEGER NOT NULL
);

CREATE TABLE Contains(
    equipment VARCHAR(25),
    dungeon VARCHAR(25),
    PRIMARY KEY (equipment, dungeon),
    FOREIGN KEY (equipment) REFERENCES EquipmentRarity(name)
    ON DELETE CASCADE,
    FOREIGN KEY (dungeon) REFERENCES DungeonDifficulty(name)
    ON DELETE CASCADE
);

CREATE TABLE DungeonName(
    boss VARCHAR(25),
    difficulty INTEGER,
    name VARCHAR(25) NOT NULL,
    PRIMARY KEY (boss, difficulty),
    FOREIGN KEY (name) REFERENCES DungeonDifficulty(name)
    ON DELETE CASCADE
);

CREATE TABLE DungeonMinLevelToDifficulty(
    minLevel INTEGER PRIMARY KEY,
    difficulty INTEGER NOT NULL
);

CREATE TABLE DungeonMinLevel(
    boss VARCHAR(25),
    difficulty INTEGER,
    minLevel INTEGER,
    PRIMARY KEY (boss, difficulty),
    FOREIGN KEY (boss, difficulty) REFERENCES DungeonName(boss, difficulty)
    ON DELETE CASCADE
);

CREATE TABLE DungeonRegion(
    boss VARCHAR(25),
    difficulty INTEGER,
    region VARCHAR(25) NOT NULL,
    PRIMARY KEY (boss, difficulty),
    FOREIGN KEY (boss, difficulty) REFERENCES DungeonName(boss, difficulty)
    ON DELETE CASCADE
);

CREATE TABLE NPC(
    name VARCHAR(25) PRIMARY KEY,
    title VARCHAR(25),
    village VARCHAR(25),
    FOREIGN KEY (village) REFERENCES Village(name)
    ON DELETE SET NULL
);

CREATE TABLE Interacts(
    npc VARCHAR(25),
    playableCharacter VARCHAR(25),
    PRIMARY KEY (npc, playableCharacter),
    FOREIGN KEY (npc) REFERENCES NPC(name)
    ON DELETE CASCADE,
    FOREIGN KEY (playableCharacter) REFERENCES PlayableCharacter(username)
    ON DELETE CASCADE
);

CREATE TABLE Quest(
    title VARCHAR(25) PRIMARY KEY,
    difficulty INTEGER NOT NULL,
    reward INTEGER NOT NULL,
    length INTEGER NOT NULL,
    minLevel INTEGER NOT NULL,
    startNPC VARCHAR(25),
    FOREIGN KEY (startNPC) REFERENCES NPC(name)
    ON DELETE CASCADE
);

CREATE TABLE WorksOn(
    quest VARCHAR(25),
    npc VARCHAR(25),
    playableCharacter VARCHAR(25),
    PRIMARY KEY (quest, npc, playableCharacter),
    FOREIGN KEY (quest) REFERENCES Quest(title)
    ON DELETE CASCADE,
    FOREIGN KEY (npc) REFERENCES NPC(name)
    ON DELETE CASCADE,
    FOREIGN KEY (playableCharacter) REFERENCES PlayableCharacter(username)
    ON DELETE CASCADE
);

CREATE TABLE PetOwner(
    name VARCHAR(25) PRIMARY KEY,
    owner VARCHAR(25),
    FOREIGN KEY (name) REFERENCES PetSpecies(name)
    ON DELETE CASCADE,
    FOREIGN KEY (owner) REFERENCES PlayableCharacter(username)
    ON DELETE CASCADE
);

CREATE TABLE PetLevel(
    species VARCHAR(25),
    abilityCooldown INTEGER,
    pLevel INTEGER NOT NULL,
    PRIMARY KEY (species, abilityCooldown),
    FOREIGN KEY (species) REFERENCES PetSpecies(name)
    ON DELETE CASCADE
);

CREATE TABLE Monster(
    name VARCHAR(25) PRIMARY KEY,
    type VARCHAR(25) NOT NULL,
    monsLevel INTEGER NOT NULL,
    health INTEGER NOT NULL,
    attack INTEGER NOT NULL,
    defense INTEGER NOT NULL,
    defends VARCHAR(25),
    FOREIGN KEY (defends) REFERENCES DungeonDifficulty(name)
    ON DELETE SET NULL
);

CREATE TABLE Fights(
    playableCharacter VARCHAR(25),
    monster VARCHAR(25),
    PRIMARY KEY (playableCharacter, monster),
    FOREIGN KEY (playableCharacter) REFERENCES PlayableCharacter(username)
    ON DELETE CASCADE,
    FOREIGN KEY (monster) REFERENCES Monster(name)
    ON DELETE CASCADE
);

CREATE TABLE Boss(
    name VARCHAR(25) PRIMARY KEY,
    ability VARCHAR(25) UNIQUE,
    FOREIGN KEY (name) REFERENCES Monster(name)
    ON DELETE CASCADE
);

CREATE TABLE Neutral(
    name VARCHAR(25) PRIMARY KEY,
    triggeredBy VARCHAR(25) NOT NULL,
    FOREIGN KEY (name) REFERENCES Monster(name)
    ON DELETE CASCADE
);

-- INSERTS

INSERT
INTO Village(name, region, population, minLevel)
VALUES ('Tutorial Town', 'Lowlands', 25, 1),
('Farms', 'Lowlands', 40, 5),
('Aria Falls', 'Wicked Forest', 20, 20),
('Shipton', 'Beach', 50, 30),
('Frostford', 'Mount Veritas', 25, 40);

INSERT
INTO PetAbility(species, ability)
VALUES ('Cat', 'Heal'),
('Dog', 'Bite'),
('Snake', 'Stun'),
('Bird', 'Fly'),
('Horse', 'Gallop');

INSERT
INTO PetSpecies(name, species)
VALUES ('Bob', 'Cat'),
('Larry', 'Dog'),
('Tabby', 'Cat'),
('Edwin', 'Bird'),
('Stacy', 'Horse');

INSERT
INTO PlayableCharacter(username, class, charLevel, health, energy, attack, defense, speed, pet)
VALUES ('Jay', 'Warrior', 5, 400, 100, 30, 15, 10, 'Bob'),
('Elle', 'Mage', 10, 1200, 110, 40, 25, 15, 'Larry'),
('Simon', 'Priest', 20, 1000, 150, 80, 50, 25, 'Tabby'),
('Alice', 'Warrior', 30, 2000, 270, 100, 80, 30, 'Edwin'),
('Steven', 'Assassin', 40, 3000, 370, 150, 110, 35, 'Stacy'),
('Felix', 'Scout', 15, 350, 100, 40, 20, 30, NULL);

INSERT
INTO EquipmentRarity(name, rarity)
VALUES ('Short Sword', 'Common'),
('Chainmail', 'Common'),
('Demonic Staff', 'Rare'),
('Magic Boots', 'Common'),
('Frost Glaive', 'Epic'),
('Light Bow', 'Common'),
('Shadow Beads', 'Epic'),
('Ritual Grail', 'Epic'),
('Singed Wand', 'Common'),
('Soulless Sabre', 'Epic');

INSERT
INTO EquipmentType(affectedStat, type)
VALUES ('Attack', 'Sword'),
('Defense', 'Armour'),
('Attack', 'Staff'),
('Speed', 'Boots'),
('Health', 'Helmet');

INSERT
INTO Sells(village, equipment, price)
VALUES ('Tutorial Town', 'Short Sword', 100),
('Farms', 'Chainmail', 250),
('Aria Falls', 'Demonic Staff', 800),
('Shipton', 'Magic Boots', 500),
('Frostford', 'Frost Glaive', 900);

INSERT
INTO EquipmentAffectedStat(name, affectedStat)
VALUES ('Short Sword', 'Attack'),
('Chainmail', 'Defense'),
('Demonic Staff', 'Attack'),
('Magic Boots', 'Speed'),
('Frost Glaive', 'Attack');

INSERT
INTO EquipmentUser(name, usedBy)
VALUES ('Short Sword', NULL),
('Chainmail', 'Jay'),
('Demonic Staff', 'Simon'),
('Magic Boots', NULL),
('Frost Glaive', 'Alice');

INSERT
INTO EquipmentName(rarity, affectedStat, name)
VALUES ('Common', 'Attack', 'Short Sword'),
('Common', 'Defense', 'Chainmail'),
('Rare', 'Attack', 'Demonic Staff'),
('Common', 'Speed', 'Magic Boots'),
('Epic', 'Attack', 'Frost Glaive');

INSERT
INTO EquipmentStatBoost(rarity, affectedStat, statBoost)
VALUES ('Common', 'Attack', 5),
('Common', 'Defense', 10),
('Rare', 'Attack', 40),
('Common', 'Speed', 5),
('Epic', 'Attack', 75);

INSERT
INTO DungeonDifficulty(name, difficulty)
VALUES ('The Abandoned Farm', 1),
('Lair of the Perished Mountain', 4),
('The Raging Catacombs', 3),
('The Eternal Cells', 3),
('The Bleak Tunnels', 2);

INSERT
INTO Contains(equipment, dungeon)
VALUES ('Light Bow', 'The Abandoned Farm'),
('Shadow Beads', 'Lair of the Perished Mountain'),
('Ritual Grail', 'The Raging Catacombs'),
('Singed Wand', 'The Eternal Cells'),
('Soulless Sabre', 'The Bleak Tunnels');

INSERT
INTO DungeonName(boss, difficulty, name)
VALUES ('The Bull', 1, 'The Abandoned Farm'),
('The Frost Dragon', 4, 'Lair of the Perished Mountain'),
('Skulls of Fear', 3, 'The Raging Catacombs'),
('The Prison Guard', 3, 'The Eternal Cells'),
('The Tree of Evil', 2, 'The Bleak Tunnels');

INSERT
INTO DungeonMinLevelToDifficulty(minLevel, difficulty)
VALUES (5, 1),
(40, 4),
(30, 3),
(90, 8),
(20, 2);

INSERT
INTO DungeonMinLevel(boss, difficulty, minLevel)
VALUES ('The Bull', 1, 5),
('The Frost Dragon', 4, 40),
('Skulls of Fear', 3, 30),
('The Prison Guard', 3, 30),
('The Tree of Evil', 2, 20);

INSERT
INTO DungeonRegion(boss, difficulty, region)
VALUES ('The Bull', 1, 'Lowlands'),
('The Frost Dragon', 4, 'Mount Veritas'),
('Skulls of Fear', 3, 'Beach'),
('The Prison Guard', 3, 'Beach'),
('The Tree of Evil', 2, 'Wicked Forest');

INSERT
INTO NPC(name, title, village)
VALUES ('Gerald', 'Leader', 'Tutorial Town'),
('Archibald', 'Forest Elf', 'Aria Falls'),
('Petra', 'Farmer', 'Farms'),
('Maurelle', 'Shiphand', 'Shipton'),
('Sampson', 'Adventurer', 'Frostford');

INSERT
INTO Interacts(NPC, playableCharacter)
VALUES ('Gerald', 'Jay'),
('Archibald', 'Jay'),
('Petra', 'Jay'),
('Maurelle', 'Jay'),
('Sampson', 'Jay');

INSERT
INTO Quest(title, difficulty, reward, length, minLevel, startNPC)
VALUES ('First Steps', 1, 500, 2, 1, 'Gerald'),
('Too Many Weeds', 2, '600', 2, 5, 'Petra'),
('Collect Clams', 4, 1500, 3, 30, 'Maurelle'),
('Forest Restoration', 3, 800, 3, 20, 'Archibald'),
('Slippery Hike', 5, 2000, 4, 40, 'Sampson');

INSERT
INTO WorksOn(quest, NPC, playableCharacter)
VALUES ('First Steps', 'Gerald', 'Jay'),
('Too Many Weeds', 'Petra', 'Simon'),
('Collect Clams', 'Maurelle', 'Jay'),
('Forest Restoration', 'Archibald', 'Elle'),
('Slippery Hike', 'Sampson', 'Alice');

INSERT
INTO PetOwner(name, owner)
VALUES ('Bob', 'Jay'),
('Larry', 'Elle'),
('Tabby', 'Simon'),
('Edwin', 'Alice'),
('Stacy', 'Steven');

INSERT
INTO PetLevel(species, abilityCooldown, pLevel)
VALUES ('Cat', 8, 3),
('Dog', 3, 8),
('Cat', 6, 5),
('Bird', 10, 6),
('Dog', 5, 6);

INSERT
INTO Monster(name, type, monsLevel, health, attack, defense, defends)
VALUES ('Timid Zombie', 'Undead', 1, 50, 5, 0, NULL),
('Clam', 'Water', 20, 800, 30, 10, NULL),
('Tree Sprite', 'Earth', 5, 300, 10, 2, NULL),
('Mountain Goat', 'Ice', 30, 1200, 50, 30, NULL),
('Clay Dummy', 'Earth', 10, 700, 20, 5, NULL),
('The Bull', 'Normal', 10, 700, 20, 5, 'The Abandoned Farm'),
('Skulls of Fear', 'Undead', 1, 50, 5, 0, 'The Raging Catacombs'),
('The Prison Guard', 'Undead', 1, 50, 5, 0, 'The Eternal Cells'),
('The Tree of Evil', 'Earth', 25, 1000, 75, 100, 'The Bleak Tunnels'),
('The Frost Dragon', 'Ice', 75, 5000, 250, 400, 'Lair of the Perished Mountain'),
('Sleepy Spider', 'Earth', 10, 700, 20, 5, NULL),
('Beach Crab', 'Water', 30, 1200, 50, 30, NULL),
('Mountain Bear', 'Ice', 30, 1200, 50, 30, NULL);

INSERT
INTO Fights(playableCharacter, monster)
VALUES ('Jay', 'Timid Zombie'),
('Simon', 'Clam'),
('Elle', 'Tree Sprite'),
('Alice', 'Mountain Goat'),
('Stacy', 'Clay Dummy');

INSERT
INTO Boss(name, ability)
VALUES ('The Bull', 'Unstoppable Charge'),
('Clam', 'Water Gun'),
('Skulls of Fear', 'Death Bite'),
('The Prison Guard', 'Bat Strike'),
('The Tree of Evil', 'Roots of Doom'),
('The Frost Dragon', 'Frozen Roar'),
('Tree Sprite', 'Vine Whip');

INSERT
INTO Neutral(name, triggeredBy)
VALUES ('Sleepy Spider', 'Loud noise'),
('Timid Zombie', 'Proximity'),
('Clay Dummy', 'Proximity'),
('Beach Crab', 'Damage'),
('Mountain Bear', 'Damage');