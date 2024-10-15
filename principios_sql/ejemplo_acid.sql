BEGIN TRANSACTION;

-- Step 1: Check if product is available
IF (SELECT InventoryQuantity FROM Products WHERE ProductID = @ProductID) >= @OrderedQuantity
BEGIN
    -- Deduct ordered quantity from inventory
    UPDATE Products
    SET InventoryQuantity = InventoryQuantity - @OrderedQuantity
    WHERE ProductID = @ProductID;

    -- Calculate total cost
    DECLARE @UnitPrice DECIMAL(10, 2) = (SELECT UnitPrice FROM Products WHERE ProductID = @ProductID);
    DECLARE @TotalCost DECIMAL(10, 2) = @OrderedQuantity * @UnitPrice;

    -- Deduct total cost from customer's account
    UPDATE Customers
    SET AccountBalance = AccountBalance - @TotalCost
    WHERE CustomerID = @CustomerID;

    -- Record order in 'Orders' table
    INSERT INTO Orders (ProductID, CustomerID, Quantity, TotalCost)
    VALUES (@ProductID, @CustomerID, @OrderedQuantity, @TotalCost);

    COMMIT;
    PRINT 'Order placed successfully.';
END
ELSE
BEGIN
    ROLLBACK;
    PRINT 'Product not available in the inventory. Order rolled back.';
END;
