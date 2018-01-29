<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">

  <h2>MANAGE <span style="color: yellow;">TUTORIALS</span></h2>
  <ul>
    <xsl:for-each select="tutorials/tutorial">
    	<xsl:sort select="category"/>
     	<xsl:sort select="topic"/>
    	<li>
        <form action="modify_tutorial.php" method="POST">
    		  <input type="hidden" name="topic" value="{topic}"/>
          <input type="hidden" name="category" value="{category}"/>
          <input type="text" name="new_topic" value="{topic}"/>
          <input type="text" name="new_category" value="{category}"/>
          <br/>
    		  <input type="submit" value="M O D I F Y"/>
        </form>
        <form action="delete_tutorial.php" method="POST">
          <input type="hidden" name="topic" value="{topic}"/>
          <input type="hidden" name="category" value="{category}"/>
          <input type="submit" value="D E L E T E"/>
        </form>
        <br/>
    	</li>
    </xsl:for-each>
  </ul>

</xsl:template>

</xsl:stylesheet>