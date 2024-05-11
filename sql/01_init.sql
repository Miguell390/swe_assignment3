CREATE TABLE StockInventory (
    stockId INT AUTO_INCREMENT PRIMARY KEY,
    StockName VARCHAR(255),
    Supplier VARCHAR(255)
);

CREATE TABLE MenuItems (
    menuId INT AUTO_INCREMENT PRIMARY KEY,
    menuName VARCHAR(255),
    price INT
);

CREATE TABLE FeedbackReview (
    rating INT,
    feedbackNotes VARCHAR(255)
);


-- ALTER TABLE Staff ADD FOREIGN KEY (RoleId) REFERENCES Roles(Id);

-- ALTER TABLE Inventory ADD FOREIGN KEY (ManagedLocationId) REFERENCES ManagedLocations(Id);

-- ALTER TABLE Availabilities ADD FOREIGN KEY (StaffId) REFERENCES Staff(Id);

-- ALTER TABLE Room ADD FOREIGN KEY (BookedFor) REFERENCES Members(Id);
-- ALTER TABLE Room ADD FOREIGN KEY (ManagedLocationId) REFERENCES ManagedLocations(Id);

-- ALTER TABLE Utilities ADD FOREIGN KEY (BookedFor) REFERENCES Members(Id);
-- ALTER TABLE Utilities ADD FOREIGN KEY (ManagedLocationId) REFERENCES ManagedLocations(Id);

-- ALTER TABLE ServiceRecords ADD FOREIGN KEY (MemberId) REFERENCES Members(Id);
-- ALTER TABLE ServiceRecords ADD FOREIGN KEY (StaffId) REFERENCES Staff(Id);
-- ALTER TABLE ServiceRecords ADD FOREIGN KEY (ManagedLocationId) REFERENCES ManagedLocations(Id);
-- ALTER TABLE ServiceRecords ADD FOREIGN KEY (RosterId) REFERENCES Rosters(Id);


-- ALTER TABLE BillingItem ADD FOREIGN KEY (BillingReportId) REFERENCES BillingReports(Id);
-- ALTER TABLE BillingItem ADD FOREIGN KEY (MemberId) REFERENCES Members(Id);