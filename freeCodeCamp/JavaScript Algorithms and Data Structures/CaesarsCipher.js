function rot13(str) {
  const alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  return [...str].reduce((result, value) => {
    if (value.match(/\w/g)) {
      const posicion = alphabet.indexOf(value);
      const nuevaPosicion = (posicion + 13) % alphabet.length;
      return result + alphabet[nuevaPosicion];
    }
    return result + value;
  }, '');
}

rot13("SERR PBQR PNZC");