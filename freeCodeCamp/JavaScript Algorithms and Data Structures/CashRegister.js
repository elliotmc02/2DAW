function checkCashRegister(price, cash, cid) {
  const currency = [
    ['ONE HUNDRED', 100],
    ['TWENTY', 20],
    ['TEN', 10],
    ['FIVE', 5],
    ['ONE', 1],
    ['QUARTER', 0.25],
    ['DIME', 0.1],
    ['NICKEL', 0.05],
    ['PENNY', 0.01]
  ];

  let changeDue = cash - price;
  const totalInCid = cid.reduce((accum, val) => accum + val[1], 0);
  if (totalInCid < changeDue) return { status: 'INSUFFICIENT_FUNDS', change: [] };
  if (totalInCid == changeDue) return { status: 'CLOSED', change: cid };

  const change = [];

  cid.reverse();

  currency.forEach(([unit, currencyValue], i) => {
    const availableAmount = Math.floor(cid[i][1] / currencyValue);
    const amountNeeded = Math.floor(changeDue / currencyValue);
    const finalAmount =
      (availableAmount > amountNeeded ? amountNeeded : availableAmount) *
      currencyValue;
    if (amountNeeded > 0) {
      changeDue = +(changeDue - finalAmount).toFixed(2);
      change.push([unit, finalAmount]);
    }
  });
  if (changeDue > 0) return { status: 'INSUFFICIENT_FUNDS', change: [] };
  return { status: 'OPEN', change: change };
}

checkCashRegister(19.5, 20, [
  ['PENNY', 1.01],
  ['NICKEL', 2.05],
  ['DIME', 3.1],
  ['QUARTER', 4.25],
  ['ONE', 90],
  ['FIVE', 55],
  ['TEN', 20],
  ['TWENTY', 60],
  ['ONE HUNDRED', 100]
]);