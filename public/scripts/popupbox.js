function popup(){
  var s = document.getElementsByTagName('SELECT')[0].options, 
      l = 0, 
      d = '';
  for(i = 0; i < s.length; i++){
    if(s[i].text.length > l) l = s[i].text.length; 
  }
  for(i = 0; i < s.length; i++){
    d = '';  
    line = s[i].text.split(';');
    l1 = (l - line[0].length);
    for(j = 0; j < l1; j++){
      d += '\u00a0'; 
    }
    s[i].text = line[0] + d + line[1];
  }  
};