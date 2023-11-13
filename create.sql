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
    name VARCHAR(40) PRIMARY KEY,
    difficulty INTEGER NOT NULL
);

CREATE TABLE Contains(
    equipment VARCHAR(25),
    dungeon VARCHAR(40),
    PRIMARY KEY (equipment, dungeon),
    FOREIGN KEY (equipment) REFERENCES EquipmentRarity(name)
    ON DELETE CASCADE,
    FOREIGN KEY (dungeon) REFERENCES DungeonDifficulty(name)
    ON DELETE CASCADE
);

CREATE TABLE DungeonName(
    boss VARCHAR(40),
    difficulty INTEGER,
    name VARCHAR(40) NOT NULL,
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
    name VARCHAR(40) PRIMARY KEY,
    type VARCHAR(25) NOT NULL,
    monsLevel INTEGER NOT NULL,
    health INTEGER NOT NULL,
    attack INTEGER NOT NULL,
    defense INTEGER NOT NULL,
    defends VARCHAR(40),
    FOREIGN KEY (defends) REFERENCES DungeonDifficulty(name)
    ON DELETE SET NULL
);

CREATE TABLE Fights(
    playableCharacter VARCHAR(25),
    monster VARCHAR(40),
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