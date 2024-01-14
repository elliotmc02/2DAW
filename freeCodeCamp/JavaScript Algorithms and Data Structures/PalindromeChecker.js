function palindrome(str) {
  return [...str.toLowerCase().replace(/[^a-zA-Z0-9]/g, '')].reverse().join('') == str.toLowerCase().replace(/[^a-zA-Z0-9]/g, '');
}

palindrome("eye");
palindrome("A man, a plan, a canal. Panama");
palindrome("0_0 (: /-\ :) 0-0");